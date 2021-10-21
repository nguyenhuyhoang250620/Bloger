<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class CreateNewsTableTim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->timestamps();
        });
        $arrayData = [
            [
                'title'      => 'Lạnh người với loạt Screenshots vừa được Resident Evil 2 Remake nhá hàng',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Những kiến thức cần biết khi sử dụng Flare Gun trong PUBG Mobile',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Đánh giá Razer Blade 15: Laptop gaming hoàn hảo, mỗi tội đau thận',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Cùng ngắm cosplay Saber đẹp đến ngất ngây trong Fate/Extella',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Game võ hiệp Wushu Chronicles chính thức có mặt trên Steam',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => '8 sự thật thú vị về series game nổi tiếng Call of Duty, toàn những con số nhức hết cả não',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => '10 Game mobile miễn phí hay nhất trên cả Android và IOS năm 2018 này',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Sự trỗi dậy của eSports: môn thể thao hoàn toàn mới sinh ra từ công nghệ',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'EA tiếp tục khiến game thủ thất vọng, Battlefield 5 phải lùi ngày ra mắt',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Bleach: Ulquiorra với Orihime Inoue, tình yêu tuyệt đẹp giữa ác quỷ và thiên thần',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Điểm mặt gọi tên hệ thống phó bản của MU Strongest',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title'      => 'Những tác giả truyện kiếm hiệp nổi tiếng nhất với gamer Việt',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        DB::table('news')->insert($arrayData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
