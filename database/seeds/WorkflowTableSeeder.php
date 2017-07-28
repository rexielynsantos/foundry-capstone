<?php

use Illuminate\Database\Seeder;

class WorkflowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tblworkflow')->insert([
          'strWorkflowID' => 'WORK00001',
          'strWorkflowName' => 'Draft',
          'strModuleID' => 'MOD00001',
          'boolDraftIsChecked' => 0,
          'boolForRevisionIsChecked' => 0,
          'boolForReviewIsChecked' => 1,
          'boolRevisedIsChecked' => 0,
          'boolApprovedIsChecked' => 0,
          'boolExpiredIsChecked' => 1
      ]);
      DB::table('tblworkflow')->insert([
          'strWorkflowID' => 'WORK00002',
          'strWorkflowName' => 'For Review',
          'strModuleID' => 'MOD00001',
          'boolDraftIsChecked' => 0,
          'boolForRevisionIsChecked' => 1,
          'boolForReviewIsChecked' => 0,
          'boolRevisedIsChecked' => 0,
          'boolApprovedIsChecked' => 1,
          'boolExpiredIsChecked' => 1
      ]);

      DB::table('tblworkflow')->insert([
          'strWorkflowID' => 'WORK00003',
          'strWorkflowName' => 'For Revision',
          'strModuleID' => 'MOD00001',
          'boolDraftIsChecked' => 0,
          'boolForRevisionIsChecked' => 1,
          'boolForReviewIsChecked' => 0,
          'boolRevisedIsChecked' => 0,
          'boolApprovedIsChecked' => 1,
          'boolExpiredIsChecked' => 1
      ]);
      DB::table('tblworkflow')->insert([
          'strWorkflowID' => 'WORK00004',
          'strWorkflowName' => 'Revised',
          'strModuleID' => 'MOD00001',
          'boolDraftIsChecked' => 0,
          'boolForRevisionIsChecked' => 1,
          'boolForReviewIsChecked' => 0,
          'boolRevisedIsChecked' => 0,
          'boolApprovedIsChecked' => 1,
          'boolExpiredIsChecked' => 1
      ]);
      DB::table('tblworkflow')->insert([
          'strWorkflowID' => 'WORK00005',
          'strWorkflowName' => 'Approved',
          'strModuleID' => 'MOD00001',
          'boolDraftIsChecked' => 0,
          'boolForRevisionIsChecked' => 1,
          'boolForReviewIsChecked' => 0,
          'boolRevisedIsChecked' => 0,
          'boolApprovedIsChecked' => 1,
          'boolExpiredIsChecked' => 1
      ]);
      DB::table('tblworkflow')->insert([
          'strWorkflowID' => 'WORK00006',
          'strWorkflowName' => 'Expired',
          'strModuleID' => 'MOD00001',
          'boolDraftIsChecked' => 0,
          'boolForRevisionIsChecked' => 1,
          'boolForReviewIsChecked' => 0,
          'boolRevisedIsChecked' => 0,
          'boolApprovedIsChecked' => 1,
          'boolExpiredIsChecked' => 1
      ]);

  }
}
