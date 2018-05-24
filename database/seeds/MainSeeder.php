<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MainSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('categories')->insert([
            'name' => 'Sữa Đậu Nành',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'Sữa Bột',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        for ($i=1; $i < 20; $i++) { 
        	DB::table('products')->insert([
            	'category_id' => 1,
                'name' => 'Sữa đậu nành Vinamilk hạt Óc chó - Lốc 4 hộp x 180ml - '.$i,
                'img' => '1.jpg',
                'quantity' => 5,
                'price' => 24000,
                'packet' => '12 lốc/thùng',
                'summary' => 'Giàu chất chống Oxy hóa, được chắt lọc từ những hạt Óc chó cao cấp từ Mỹ Lợi ích 3 TÔT: Tốt cho làn da, Tốt cho vóc dáng, Tốt cho trí não',
                'description' => 'Được làm từ hạt Óc chó cao cấp từ Mỹ, giàu chất chống oxy hóa tốt cho trí não.<br>
Kết hợp cùng những hạt đậu nành nguyên chất 100% được chọn lọc, không biến đổi gen, thơm ngon tự nhiên.<br>
Bổ sung nhiều loại Vitamin: A, D3, E, PP, Omega 3.<br>
 Lợi ích 3 TỐT: đẹp dáng, đẹp da, tốt cho trí não',
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
        	]);
        }

        for ($i=1; $i < 20; $i++) { 
            DB::table('products')->insert([
                'category_id' => 2,
                'name' => 'Sữa bột Vinamilk Optimum Gold 4 400g (Hộp thiếc) - '.$i,
                'img' => '2.jpg',
                'quantity' => 5,
                'price' => 144000,
                'packet' => '24 hộp/thùng',
                'summary' => 'Optimum Gold mới, chất lượng được công nhận bởi UKAS - Anh Quốc
Bổ sung thêm 20% DHA từ tảo tinh khiết, kết hợp cùng Lutein
Giúp trẻ phát triển não bộ vượt trội
Tăng khả năng nhận thức và học hỏi',
                'description' => '
<div>Optimum Gold mới, chất lượng được công nhận bởi UKAS - Anh Quốc,
    với công thức để hấp thu này được bổ sung thêm 20% DHA từ tảo tinh
    khiết, kết hợp cùng Lutein giúp trẻ phát triển não bộ vượt trội, tăng
    khả năng nhận thức và học hỏi.</div>
<div>
    <br>
</div>
<div>
    Ngoài ra nguồn đạm whey từ sữa giàu Alpha Lactalbumin dễ hấp thu, cùng
    chất xơ hòa tan FOS và lợi khuẩn Probiotic hỗ trợ sức khỏe hệ tiêu hóa
    , giúp trẻ hấp thu tốt hơn nguồn dưỡng chất cho sự phát triển trí não
    và thể chất.<br>
    <br>
</div>
<div>
    <strong>1. DHA từ tảo tinh khiết:</strong> Bổ sung thêm 20% DHA từ tảo
    tinh khiết, giúp đáp ứng hàm lượng theo khuyến nghị hàng ngày của các
    chuyên gia Y tế thế giới FAO/WHO.
</div>
<div>
    <br>
</div>
<div>
    <strong>2. Lutein:</strong> là chất chống oxy hóa, đóng vai trò quan
    trọng giúp bảo vệ và phát triển võng mạc mắt. Sự kết hợp độc đáo của
    DHA, Lutein cùng các dưỡng chất khác như DRA, Omega 3, Omega 6, Taurin
    và CHolin giúp phát triển não bộ, thị giác tốt hơn, tăng khả năng nhận
    thức và học hỏi của trẻ.
</div>
<div>
    <br>
</div>
<div>
    <strong>3. Đạm whey giàu Alpha - Lactalbumin:</strong> là loại đạm dễ
    hấp thu, cung cấp lượng axit amin thiết yếu cao, cân đối cùng tỷ lệ đạm
    whey casein phù hợp giúp trẻ dễ tiêu hóa hấp thu, hõ trợ hoạt động hệ
    tiêu hóa của trẻ. Chất xơ hòa tan FOS và hệ men vi sinh
    Bifidobacterium, BB-12 và Lactobaclllus, rhamnosus GG, LGG giúp tăng vi
    khuẩn có lợi, ức chế vi khuẩn có hại, hỗ trợ hệ tiêu hóa của trẻ khỏe
    mạnh, giúp nhuận trường, tăng khả năng hấp thụ các dưỡng chất thiết
    yếu.
</div>
<div>
    <br>
</div>
<div>
    <strong>4. Dưỡng chất thiết yếu giúp tăng sức đề kháng và chiều
        cao:&nbsp;</strong>
</div>
<div>- Các vitamin và khoáng chất thiết yếu như A, D3, C, kẽm, Selen và
    hỗn hợp Nucleotid giúp tăng cường sức đề kháng, hỗ trợ hệ miễn dịch của
    trẻ, bảo vệ khỏi các bệnh nhiễm khuẩn thông thường.</div>',
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

        DB::table('promotions')->insert([
            'product_id' => 16,
            'price' => 22000,
            'start' => '2018-5-10',
            'end' => '2018-12-31',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('product_details')->insert([
            'product_id' => 16,
            'name' => 'Năng lượng',
            'value' => '56.6',
            'unit' => 'kcal',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('product_details')->insert([
            'product_id' => 16,
            'name' => 'Chất béo',
            'value' => '1.0',
            'unit' => 'g',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('product_details')->insert([
            'product_id' => 16,
            'name' => 'Chất đạm',
            'value' => '2.0',
            'unit' => 'g',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('product_details')->insert([
            'product_id' => 16,
            'name' => 'Chất đạm',
            'value' => '2.0',
            'unit' => 'g',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('product_details')->insert([
            'product_id' => 16,
            'name' => 'Hydrat cacbon',
            'value' => '9.9',
            'unit' => 'g',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('product_details')->insert([
            'product_id' => 16,
            'name' => 'Cholesterol',
            'value' => '0',
            'unit' => 'g',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'name',
            'email' => 'email@gmail.com',
            'password' => Hash::make('2'),
            'phone' => '2',
            'birthday' => \Carbon\Carbon::now(),
            'gender' => 1,
            'city' => 'city',
            'country' => 'country',
            'address' => 'address',
            'active' => 1,
            'admin' => 0,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1'),
            'phone' => '1',
            'birthday' => \Carbon\Carbon::now(),
            'gender' => 1,
            'city' => 'city',
            'country' => 'country',
            'address' => 'address',
            'active' => 1,
            'admin' => 1,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('orders')->insert([
            'name' => 'name',
            'email' => 'email@gmail.com',
            'phone' => '2',
            'birthday' => \Carbon\Carbon::now(),
            'gender' => 1,
            'city' => 'city',
            'country' => 'country',
            'address' => 'address',
            'method' => 'offline',
            'total_quantity' => 5,
            'total_price' => 236000,
            'status' => 0,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 16,
            'price' => 22000,
            'quantity' => 2,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 17,
            'quantity' => 2,
            'price' => 24000,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 35,
            'quantity' => 1,
            'price' => 144000,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        // order 2
        DB::table('orders')->insert([
            'name' => 'name2',
            'email' => 'email2@gmail.com',
            'phone' => '2',
            'birthday' => \Carbon\Carbon::now(),
            'gender' => 1,
            'city' => 'city',
            'country' => 'country',
            'address' => 'address',
            'method' => 'offline',
            'total_quantity' => 1,
            'total_price' => 144000,
            'status' => 0,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('payers')->insert([
            'order_id' => 2,
            'name' => 'payer',
            'email' => 'payer@gmail.com',
            'phone' => '3',
            'birthday' => \Carbon\Carbon::now(),
            'gender' => 1,
            'city' => 'payercity',
            'country' => 'payercountry',
            'address' => 'payeraddress',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 35,
            'quantity' => 1,
            'price' => 144000,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        //// order 2
    }
}
