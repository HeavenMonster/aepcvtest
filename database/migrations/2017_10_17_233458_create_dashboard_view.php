<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create view dashboard_view as
            select
                count(id) as comments,
                (select count(*) from posts) as posts,
                (select count(*) from blocked_emails) as blocked_emails,
                (select
                    (select count(*) from comments as t1 where t1.email = comments.email) || ',' || comments.email as active_user
                        from comments
                        order by active_user desc
                        limit 1) as active_user
            from comments");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('drop view if exists dashboard_view');
    }
}
