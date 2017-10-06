 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobticketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbljobticket', function (Blueprint $table) {
        $table->string('strJobTicketID')->primary();
        $table->string('strEmployeeID');
        $table->string('strStageID');
        $table->string('strSubStageID')->nullable();
        $table->string('strJobOrdID');
        $table->foreign('strStageID')
                  ->references('strStageID')->on('tblstage');
        $table->foreign('strSubStageID')
                  ->references('strSubStageID')->on('tblsubstage');
        $table->foreign('strEmployeeID')
          ->references('strEmployeeID')->on('tblemployee');
        $table->foreign('strJobOrdID')
                  ->references('strJobOrdID')->on('tbljoborder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbljobticket');
    }
}
