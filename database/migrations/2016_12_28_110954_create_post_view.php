<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement("drop view IF EXISTS postsview");
       DB::statement("create view postsview as
                        select
                        (select path from images i where i.imageable_type ='Post' and i.imageable_id = p.id )path,
                        p.*,ptp.tag_id from posts p,post_tag_pivot ptp 
                        where p.id=ptp.post_id
                        and p.is_draft=1");
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("Drop view postsview");
    }
}
