<?php

use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

test('contact page loads successfully', function () {
    $this->get('/contact')
        ->assertSuccessful();
});

test('submitting a contact form inquiry stores the contact and sends an email', function () {
    Mail::fake();

    $contactData = [
        'firstName' => 'Chiji',
        'lastName' => 'Linux',
        'email' => 'chiji@example.com',
        'phone' => '+2347065910449',
        'company' => 'Forahia Solutions Ltd',
        'position' => 'CTO',
        'projectType' => 'digital-transformation',
        'budget' => 'over-100k',
        'timeline' => 'asap',
        'message' => 'We want to build a premium enterprise application for digital transformation.',
    ];

    $response = $this->post('/contact', $contactData);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    // Assert it was saved to the database
    $this->assertDatabaseHas('contacts', [
        'first_name' => 'Chiji',
        'last_name' => 'Linux',
        'email' => 'chiji@example.com',
        'phone' => '+2347065910449',
        'company' => 'Forahia Solutions Ltd',
        'position' => 'CTO',
        'project_type' => 'digital-transformation',
        'budget' => 'over-100k',
        'timeline' => 'asap',
        'message' => 'We want to build a premium enterprise application for digital transformation.',
        'status' => 'new',
    ]);

    // Assert the email was sent to correct recipient
    Mail::assertSent(ContactFormMail::class, function ($mail) {
        return $mail->hasTo(config('mail.to')) &&
               $mail->contact->email === 'chiji@example.com' &&
               $mail->contact->company === 'Forahia Solutions Ltd';
    });
});

test('contact form validation fails with invalid or missing data', function (array $invalidData, array $expectedErrors) {
    Mail::fake();

    $response = $this->post('/contact', $invalidData);

    $response->assertRedirect();
    $response->assertSessionHasErrors($expectedErrors);

    // Assert no email was sent
    Mail::assertNothingSent();

    // Assert no contact was saved in database
    $this->assertDatabaseCount('contacts', 0);
})->with([
    'missing required fields' => [
        [],
        ['firstName', 'lastName', 'email', 'company', 'projectType', 'message'],
    ],
    'invalid email address' => [
        [
            'firstName' => 'Chiji',
            'lastName' => 'Linux',
            'email' => 'not-an-email',
            'company' => 'Forahia Solutions Ltd',
            'projectType' => 'web-development',
            'message' => 'Test message',
        ],
        ['email'],
    ],
    'invalid project type' => [
        [
            'firstName' => 'Chiji',
            'lastName' => 'Linux',
            'email' => 'chiji@example.com',
            'company' => 'Forahia Solutions Ltd',
            'projectType' => 'invalid-project-type',
            'message' => 'Test message',
        ],
        ['projectType'],
    ],
    'invalid budget range' => [
        [
            'firstName' => 'Chiji',
            'lastName' => 'Linux',
            'email' => 'chiji@example.com',
            'company' => 'Forahia Solutions Ltd',
            'projectType' => 'web-development',
            'budget' => 'invalid-budget',
            'message' => 'Test message',
        ],
        ['budget'],
    ],
    'invalid timeline' => [
        [
            'firstName' => 'Chiji',
            'lastName' => 'Linux',
            'email' => 'chiji@example.com',
            'company' => 'Forahia Solutions Ltd',
            'projectType' => 'web-development',
            'timeline' => 'invalid-timeline',
            'message' => 'Test message',
        ],
        ['timeline'],
    ],
    'message too long' => [
        [
            'firstName' => 'Chiji',
            'lastName' => 'Linux',
            'email' => 'chiji@example.com',
            'company' => 'Forahia Solutions Ltd',
            'projectType' => 'web-development',
            'message' => str_repeat('a', 2001),
        ],
        ['message'],
    ],
]);

test('contact form submission handles email sending failure gracefully', function () {
    Mail::fake();

    // Mock Mail to throw an exception when sending ContactFormMail
    Mail::shouldReceive('to')
        ->with(config('mail.to'))
        ->andReturn(new class
        {
            public function send($mailable)
            {
                throw new \Exception('Failed to send mail');
            }
        });

    $contactData = [
        'firstName' => 'Chiji',
        'lastName' => 'Linux',
        'email' => 'chiji@example.com',
        'phone' => '+2347065910449',
        'company' => 'Forahia Solutions Ltd',
        'position' => 'CTO',
        'projectType' => 'digital-transformation',
        'budget' => 'over-100k',
        'timeline' => 'asap',
        'message' => 'Mail failure test message.',
    ];

    $response = $this->post('/contact', $contactData);

    $response->assertRedirect();
    $response->assertSessionHas('error');

    // Assert the contact was still stored in the database
    $this->assertDatabaseHas('contacts', [
        'first_name' => 'Chiji',
        'last_name' => 'Linux',
        'email' => 'chiji@example.com',
        'company' => 'Forahia Solutions Ltd',
    ]);
});
