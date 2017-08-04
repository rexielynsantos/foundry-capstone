<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductTypeTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(UOMTypeTableSeeder::class);
        $this->call(StageTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(WorkflowTableSeeder::class);
        $this->call(SubStageTableSeeder::class);
        $this->call(ProductTypeDetailTableSeeder::class);
        $this->call(QuoteRequestTableSeeder::class);
        $this->call(JobtitleTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(UserActionTableSeeder::class);
        // $this->call(PaymentTermTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(ProductVariantSeeder::class);
        $this->call(SupplierTableSeeder::class);
        // $this->call(ProductTypeDetailTableSeeder::class);
        $this->call(StageDetailSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductDetailTableSeeder::class);
        $this->call(ProductVariantDetailTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(MaterialSupplierTableSeeder::class);
        $this->call(QuoteProductTableSeeder::class);
        $this->call(JobTicketTableSeeder::class);
        // $this->call(JobTicketDetailTableSeeder::class);
         $this->call(PurchaseTableSeeder::class);
         $this->call(PurchaseDetailTableSeeder::class);
         $this->call(ReceivePurchaseTableSeeder::class);
         $this->call(ReceivePurchaseDetailTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(MaterialVariantTableSeeder::class);


    }
}
