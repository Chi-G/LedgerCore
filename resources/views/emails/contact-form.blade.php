<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #1f2937;
            background-color: #f9fafb;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .header p {
            margin: 8px 0 0 0;
            opacity: 0.9;
            font-size: 16px;
        }
        .content {
            padding: 30px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #1e40af;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e5e7eb;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .info-item {
            background: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #3b82f6;
        }
        .info-label {
            font-weight: 600;
            color: #374151;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .info-value {
            color: #1f2937;
            font-size: 16px;
        }
        .message-section {
            background: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #10b981;
        }
        .message-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
        }
        .message-text {
            color: #1f2937;
            line-height: 1.7;
            white-space: pre-wrap;
        }
        .footer {
            background: #f8fafc;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        .footer p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .badge-new {
            background: #dbeafe;
            color: #1e40af;
        }
        .badge-urgent {
            background: #fef3c7;
            color: #d97706;
        }
        .priority-high {
            background: #fef2f2;
            border-left-color: #ef4444;
        }
        .priority-medium {
            background: #fef3c7;
            border-left-color: #f59e0b;
        }
        .priority-low {
            background: #f0fdf4;
            border-left-color: #10b981;
        }
        @media (max-width: 600px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            .container {
                margin: 0;
                border-radius: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🚀 New Client Request Contact Form Submission</h1>
            <p>Forahia Solutions</p>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Contact Information -->
            <div class="section">
                <h2 class="section-title">👤 Contact Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Full Name</div>
                        <div class="info-value">{{ $contact->full_name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email Address</div>
                        <div class="info-value">
                            <a href="mailto:{{ $contact->email }}" style="color: #3b82f6; text-decoration: none;">
                                {{ $contact->email }}
                            </a>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Phone Number</div>
                        <div class="info-value">
                            @if($contact->phone)
                                <a href="tel:{{ $contact->phone }}" style="color: #3b82f6; text-decoration: none;">
                                    {{ $contact->phone }}
                                </a>
                            @else
                                <span style="color: #9ca3af;">Not provided</span>
                            @endif
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Company</div>
                        <div class="info-value">{{ $contact->company }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Position</div>
                        <div class="info-value">
                            {{ $contact->position ?: 'Not specified' }}
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Submitted At</div>
                        <div class="info-value">{{ $contact->created_at->format('F j, Y \a\t g:i A') }}</div>
                    </div>
                </div>
            </div>

            <!-- Project Details -->
            <div class="section">
                <h2 class="section-title">💼 Project Details</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Project Type</div>
                        <div class="info-value">{{ $contact->formatted_project_type }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Budget Range</div>
                        <div class="info-value">
                            {{ $contact->budget ? $contact->formatted_budget : 'Not specified' }}
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Timeline</div>
                        <div class="info-value">
                            {{ $contact->timeline ? $contact->formatted_timeline : 'Not specified' }}
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Priority</div>
                        <div class="info-value">
                            @if($contact->timeline === 'asap')
                                <span class="badge badge-urgent">URGENT</span>
                            @elseif($contact->budget && in_array($contact->budget, ['50k-100k', 'over-100k']))
                                <span class="badge badge-new">HIGH VALUE</span>
                            @else
                                <span class="badge badge-new">STANDARD</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Description -->
            <div class="section">
                <h2 class="section-title">�� Project Description</h2>
                <div class="message-section">
                    <div class="message-label">Message:</div>
                    <div class="message-text">{{ $contact->message }}</div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="section">
                <h2 class="section-title">⚡ Quick Actions</h2>
                <div style="text-align: center; margin-top: 20px;">
                    <a href="mailto:{{ $contact->email }}?subject=Re: Your Digital Transformation Inquiry&body=Hi {{ $contact->first_name }},%0D%0A%0D%0AThank you for reaching out to Forahia Solutions..."
                       style="display: inline-block; background: #3b82f6; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; margin: 0 10px; font-weight: 600;">
                        �� Reply via Email
                    </a>
                    <a href="tel:{{ $contact->phone }}"
                       style="display: inline-block; background: #10b981; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; margin: 0 10px; font-weight: 600;">
                        📞 Call Now
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>
                <strong>Forahia Solutions</strong><br>
                Global Digital Transformation Consultancy<br>
                <a href="mailto:info@forahia.com" style="color: #3b82f6;">info@forahia.com</a> |
                <a href="tel:+2347065910449" style="color: #3b82f6;">+234 (0) 706 591 0449</a>
            </p>
        </div>
    </div>
</body>
</html>
