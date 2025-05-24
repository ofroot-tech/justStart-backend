<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateFeatureControllers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:feature-controllers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate controllers for all features and user management';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $features = [
            'AutoReminders',
            'CustomerInfoStorage',
            'CustomizableInvoiceTemplates',
            'DepositRequests',
            'DigitalSignatures',
            'EstimatesToInvoices',
            'ExpenseTrackingIntegration',
            'GratuityTipsOption',
            'InvoiceTracking',
            'ItemizedServices',
            'MobileOptimization',
            'MultiplePaymentMethods',
            'PaymentStatus',
            'RecurringInvoices',
            'ServiceHistoryLookup',
            'TaxesAndDiscounts',
            'TimeTrackingIntegration',
        ];

        $this->info('Generating controllers for features...');

        foreach ($features as $feature) {
            $this->call('make:controller', ['name' => "{$feature}Controller"]);
            $this->info("Created {$feature}Controller");
        }

        // Create UserController
        $this->call('make:controller', ['name' => 'UserController']);
        $this->info('Created UserController');

        $this->info('All controllers have been generated successfully!');
        return 0;
    }
}