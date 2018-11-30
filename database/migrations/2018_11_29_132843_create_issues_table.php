<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id'); 

            $table->string('subject');
            $table->text('description');

            $table->tinyInteger('priority')->default(1);
            $table->integer('percentage')->default(0);
            $table->integer('state')->default(0);
            $table->boolean('resolved')->default(0);

            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('milestone_id')->nullable();

            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('assignee_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
