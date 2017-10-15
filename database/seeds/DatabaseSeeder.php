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
       
        $this->call(UserTableSeeder::class);
        $this->call(ProductTypeTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(StageTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(SubStageTableSeeder::class);
        $this->call(ProductTypeDetailTableSeeder::class);
        // $this->call(QuoteRequestTableSeeder::class);
        $this->call(JobtitleTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(PaymentTermTableSeeder::class);
        $this->call(UnitTableSeeder::class);    
        $this->call(SupplierTableSeeder::class);
        // $this->call(ProductTypeDetailTableSeeder::class);
        $this->call(StageDetailSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        // $this->call(QuoteProductTableSeeder::class);
         $this->call(MaterialVariantTableSeeder::class);
         $this->call(MaterialDetailTableSeeder::class);
         $this->call(MaterialSupplierTableSeeder::class);
         // $this->call(PurchaseDetailTableSeeder::class);
         $this->call(MaterialSpecTableSeeder::class);
         $this->call(MaterialSpecDetailTableSeeder::class);
         $this->call(PurchaseTableSeeder::class);
         $this->call(PurchaseDetailTableSeeder::class);
         // $this->call(PurchMatVariantTableSeeder::class);
         // $this->call(ReceivePurchaseTableSeeder::class);
         // $this->call(ReceivePurchaseDetailTableSeeder::class);
         // $this->call(ReceivePurchMatVariantDetailTableSeeder::class);
         $this->call(TermsConditionTableSeeder::class);
         $this->call(CustomerTableSeeder::class);
         $this->call(CustomerContactTableSeeder::class);
         $this->call(CostingTableSeeder::class);
         $this->call(CostingMaterialTableSeeder::class);
         $this->call(QuotationTableSeeder::class);
         $this->call(QuoteProductVariantTableSeeder::class);
         $this->call(CustPurchaseTableSeeder::class);
         // $this->call(JobOrderTableSeeder::class);
         // $this->call(JobTicketTableSeeder::class);
         // $this->call(JobTicketDetailTableSeeder::class);




    }
}
