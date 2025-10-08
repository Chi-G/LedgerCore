<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Quick Actions
        </x-slot>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Add New Project -->
            <a href="{{ route('filament.admin.resources.portfolio-projects.create') }}"
               class="flex items-center justify-center p-6 text-center transition-colors border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                <div>
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-plus-circle class="w-8 h-8 text-primary-600" />
                    </div>
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Add New Project</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Create a portfolio project</p>
                </div>
            </a>

            <!-- Add New Service -->
            <a href="{{ route('filament.admin.resources.services.create') }}"
               class="flex items-center justify-center p-6 text-center transition-colors border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                <div>
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-wrench-screwdriver class="w-8 h-8 text-info-600" />
                    </div>
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Add New Service</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Create a service offering</p>
                </div>
            </a>
 
            <!-- Add Testimonial -->
            <a href="{{ route('filament.admin.resources.testimonials.create') }}"
               class="flex items-center justify-center p-6 text-center transition-colors border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                <div>
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-chat-bubble-left-right class="w-8 h-8 text-warning-600" />
                    </div>
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Add Testimonial</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Add client feedback</p>
                </div>
            </a>

            <!-- Add Team Member -->
            <a href="{{ route('filament.admin.resources.team-members.create') }}"
               class="flex items-center justify-center p-6 text-center transition-colors border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                <div>
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-user-plus class="w-8 h-8 text-success-600" />
                    </div>
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Add Team Member</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Add a new team member</p>
                </div>
            </a>

            <!-- View Contacts -->
            <a href="{{ route('filament.admin.resources.contacts.index') }}"
               class="flex items-center justify-center p-6 text-center transition-colors border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                <div>
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-envelope-open class="w-8 h-8 text-gray-600" />
                    </div>
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">View Contacts</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Check inquiries</p>
                </div>
            </a>

            <!-- Company Settings -->
            <a href="{{ route('filament.admin.resources.company-settings.index') }}"
               class="flex items-center justify-center p-6 text-center transition-colors border border-gray-200 rounded-lg hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800">
                <div>
                    <div class="flex justify-center mb-3">
                        <x-heroicon-o-cog-6-tooth class="w-8 h-8 text-amber-600" />
                    </div>
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Company Settings</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Manage site settings</p>
                </div>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
