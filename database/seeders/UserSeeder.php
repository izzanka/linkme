<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('id' => '1','username' => 'Izzan Khairil Anam','username_slug' => 'izzan-khairil-anam','bio' => 'Fullstack Web Developer','email' => 'izzan@gmail.com','password' => '$2y$10$OlKZ9ECCfCAiflMH/tBSkug7QgvFuEPrf10j9ysuvWKJwazvz/qv.','views' => '35','remember_token' => NULL,'created_at' => NULL,'updated_at' => '2023-02-18 16:48:02'),
            array('id' => '2','username' => 'Jay583y','username_slug' => 'jay583y','bio' => NULL,'email' => 'jay583y@gmail.com','password' => '$2y$10$5HQbDMCI1M1SX4Fqw6UWQe2IHJcIaPvonkkFmrwWiuq7MRkf7LP6K','views' => '1','remember_token' => NULL,'created_at' => NULL,'updated_at' => '2023-02-18 12:41:03'),
            array('id' => '3','username' => 'Vvv','username_slug' => 'vvv','bio' => NULL,'email' => 'biyadac885@votooe.com','password' => '$2y$10$JQt6D.KjdABOIhsQ3r.ac.AlgNPKzhBAj8krXIHWR4TeNnZX9fsV2','views' => '2','remember_token' => NULL,'created_at' => NULL,'updated_at' => '2023-02-18 12:42:04'),
            array('id' => '4','username' => '15','username_slug' => '15','bio' => NULL,'email' => 'biyadac8sss85@votooe.com','password' => '$2y$10$fawwKnwK9JYwF8SgQC3FF.KKOraXOETzqW8OiB7Iyr3e1g2C4ILWS','views' => '1','remember_token' => NULL,'created_at' => NULL,'updated_at' => '2023-02-18 17:18:39'),
            array('id' => '5','username' => 'Fodase','username_slug' => 'fodase','bio' => NULL,'email' => 'biyadac885@votsssooe.com','password' => '$2y$10$pjGvX/oSg4gGeBfZj03ON.AeALCJZx45W1Evt0phHIQ6XpnXtC/Wa','views' => '1','remember_token' => NULL,'created_at' => NULL,'updated_at' => '2023-02-18 17:18:41'),
            array('id' => '6','username' => '<script>alert(“a”)','username_slug' => 'scriptalertascript','bio' => NULL,'email' => 'biyadac8wqe85@votooe.com','password' => '$2y$10$hJkuYGyystssy4h7Vv7t2ONZs.9IGrJUATH/4HfzIOojMVhMGCW1q','views' => '4','remember_token' => NULL,'created_at' => NULL,'updated_at' => '2023-02-18 17:18:45'),
            array('id' => '7','username' => 'As','username_slug' => 'as','bio' => NULL,'email' => 'jokovi1677ass@tonaeto.com','password' => '$2y$10$yni29fNZcXMaIrV48eCtJOIXGir5jhxlHhXzvQptWNNgh.XRoj6Zm','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','username' => 'Frivasoto','username_slug' => 'frivasoto','bio' => NULL,'email' => 'frivasoto@gmail.com','password' => '$2y$10$PUltB215qW7G3YWO2wUlEu5m8TCj5vJIvU6Wbabw5SNnZt1RMt9o.','views' => '2','remember_token' => NULL,'created_at' => NULL,'updated_at' => '2023-02-18 17:18:44'),
            array('id' => '9','username' => 'Hellothere','username_slug' => 'hellothere','bio' => NULL,'email' => 'hellothere@yyyy.com','password' => '$2y$10$jwFa6GBtkYss8lct7ZsBruljNmnyLSo69j3J2UbwAD2LqJL5EvA9a','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','username' => 'Ryzengaming','username_slug' => 'ryzengaming','bio' => NULL,'email' => 'ryzengaming@gmail.com','password' => '$2y$10$5If9nolD0zDIvZMuZ15hmO3feU/F6HnJ4sSOSGkNolqn0T6ubjKGC','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','username' => 'Dezaingyw','username_slug' => 'dezaingyw','bio' => NULL,'email' => 'veruzaular@gmail.com','password' => '$2y$10$rniRZxgtGPSXf8L5QWmolehcA7lKFBu17BcRo2vbEU2YAJnuSBl46','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '12','username' => 'Nitinpsaxena@gmail.com','username_slug' => 'nitinpsaxena-at-gmailcom','bio' => NULL,'email' => 'nitinpsaxena@gmail.com','password' => '$2y$10$cZ7FL3cB2zXRKpRiShcLyeU08ocMTaIqWEj9ICbAYvjVGY7rD904y','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '13','username' => 'Pablo123','username_slug' => 'pablo123','bio' => NULL,'email' => 'www.pablo.tomas.ptc@gmail.com','password' => '$2y$10$EIuhnbcmoQOxRjKQrZe7e.nVXP8x5psyj0T3mz03hv54unvxcKdUq','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '14','username' => 'Gsgsghs','username_slug' => 'gsgsghs','bio' => NULL,'email' => 'Gsgsghs@gsggw.shsg','password' => '$2y$10$rHcOaKc2vKvvdcOqRcJEb.xmUPFlyk6/v2uyv4x8qTN5jAs5b1j5u','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '15','username' => 'Patilgaurav8151','username_slug' => 'patilgaurav8151','bio' => NULL,'email' => 'patilgaurav8151@gmail.com','password' => '$2y$10$M/Gqm91zed8QwTkQ1zXgye5qU4j4Ie9UYsfYALdY5yg4TgALPZBT6','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '16','username' => 'Suprianto','username_slug' => 'suprianto','bio' => NULL,'email' => 'supriantositompul2017@gmail.com','password' => '$2y$10$hzNbGh8bEKl9cLR5vwjLU.apdV1DldpgjCJaqvwoezXFNEwOyenqW','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '17','username' => 'Yanfk','username_slug' => 'yanfk','bio' => NULL,'email' => 'icikiwir@gmail.com','password' => '$2y$10$/xoaAzjLBNYem1kq60nu7uYMoOZJi.IQT/JlcfyPaVtNzYStWdjsO','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '18','username' => 'Fauzan','username_slug' => 'fauzan','bio' => NULL,'email' => 'fauzan@user.com','password' => '$2y$10$g8V7XqPJBiuCSfOrM7nkROf2HbsAVNsiw..z9vC2skZ9aGJKyumc.','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','username' => 'PallNeedPartner','username_slug' => 'pallneedpartner','bio' => NULL,'email' => 'naufaladitya4205@gmail.com','password' => '$2y$10$fENi8gZUEIcT5AVBlmZiFe07qpD85LDgx.wAf3qn9qkWaoC9/wb7K','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '20','username' => 'Suprianto1','username_slug' => 'suprianto1','bio' => NULL,'email' => 'supriantositompul20171@gmail.com','password' => '$2y$10$87GeXbbnsUMhQKG2h8iMQuc7QRM/0WX9Ow9.bUMCM3PqR4a6ri0Oy','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '21','username' => 'Iss20010','username_slug' => 'iss20010','bio' => NULL,'email' => 'supriantositompul2020@gmail.com','password' => '$2y$10$HE0bqan9NZQSfe1WZsvt3usnmOyJn6CpHiOb6uK1EjfqkEc/nfGPO','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '22','username' => 'Suprianto12','username_slug' => 'suprianto12','bio' => NULL,'email' => 'supriantositompul68@gmail.com','password' => '$2y$10$ozS3B5raJVeU01xKNtXY0ewe1ss44kOm.9myo.66m/ZFhaLr440HK','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '23','username' => '5up3rc','username_slug' => '5up3rc','bio' => NULL,'email' => 'cypwnpwnsocute@yandex.com','password' => '$2y$10$NywH/BfMYp2.tTBm9W/7g.U4orSu6wjPndCzVBpKmvURumcNbLM3O','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '24','username' => 'Justsevahere@gmail.com','username_slug' => 'justsevahere-at-gmailcom','bio' => NULL,'email' => 'justsevahere@gmail.com','password' => '$2y$10$qU7b3eGrGeB.Jg8BHqN78.jht64VBzQtMDhPUhtWj3Trq8U0SH8wu','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '25','username' => 'Testoviy@gmail.com','username_slug' => 'testoviy-at-gmailcom','bio' => NULL,'email' => 'testoviy@gmail.com','password' => '$2y$10$yhcmhWaDgoBTRk89SlXev.zE8I450uV.c5yVmbxep.44Sj6.8OI5S','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '26','username' => 'Examp','username_slug' => 'examp','bio' => NULL,'email' => 'examp@gmail.com','password' => '$2y$10$PKFvWqFjFcRCAi12gYT8qOqZgjumKOAARtgoVqc7HQC7NR/1tcHJ.','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '27','username' => 'Test','username_slug' => 'test','bio' => NULL,'email' => 'loda@loda.com','password' => '$2y$10$q/2nwfUN93LtBo4C9v4hrO6LOL2DzZQXS9G5Adi8u0PUOoO/OtoKG','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '28','username' => 'Shenqisimao','username_slug' => 'shenqisimao','bio' => NULL,'email' => 'shenqisimao@163.com','password' => '$2y$10$0l64FMcteBVZUWmL/UgKRO45VrThq0gyJNbH8eRX8ZVbI/DfrzIlq','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '29','username' => 'Yanfkk','username_slug' => 'yanfkk','bio' => NULL,'email' => 'alfian4551@gmail.com','password' => '$2y$10$Z64Ifkvxunds2TMbVWkgWuKkl2KVxJodTgk/jst42cHGaPpU1NL1e','views' => '3','remember_token' => NULL,'created_at' => NULL,'updated_at' => '2023-02-18 12:57:31'),
            array('id' => '30','username' => 'Test2','username_slug' => 'test2','bio' => NULL,'email' => 'test@test.com','password' => '$2y$10$7K6vvci3SmSmIXlQdi1UNeiln9uIcDCek.Y.fzzYSqdkFjuhAV0bK','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '31','username' => 'Codingplace','username_slug' => 'codingplace','bio' => NULL,'email' => 'contact.codingplace@gmail.com','password' => '$2y$10$0t1aC93QnXUqgYebA5HRtevHbhgUlgufLbbWuHPEZ9N1LvWjJaDUi','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '32','username' => 'Rashi','username_slug' => 'rashi','bio' => NULL,'email' => 'xolapeh957@musezoo.com','password' => '$2y$10$QmTUqxTCDCAWsK5IEJW2x.fOt5T6Vbir9LRZqUktxmV26q9SY/x2.','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '33','username' => 'Hamid Solami','username_slug' => 'hamid-solami','bio' => NULL,'email' => 'samira.tesa@gmal.com','password' => '$2y$10$jP6O6C3oSHoi8ZDYh70QhOq8fwP4ZmspSZRn0/DJGcraOKQ54Zc82','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '34','username' => 'Jjj','username_slug' => 'jjj','bio' => NULL,'email' => 'jeysson8@gmail.com','password' => '$2y$10$klAy.nzBqHTNyEXJA3Oo.u6LmTjiQ.xmIRTP6WCiL9PKvoFyXyDHK','views' => '0','remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '35','username' => 'testing123','username_slug' => 'testing123','bio' => NULL,'email' => 'testing123@gmail.com','password' => '$2y$10$FaqFVkn8r7zfLZYnRc4Nq.454XQH79PaBqg3YEEczHU15tayw7smq','views' => '3','remember_token' => NULL,'created_at' => '2023-02-18 13:07:19','updated_at' => '2023-02-18 17:18:34'),
            array('id' => '36','username' => 'tester','username_slug' => 'tester','bio' => 'DevOps','email' => 'tester@gmail.com','password' => '$2y$10$88VZ8d4VIlXJ9nSTYA7BHOEMPNHu9s41go6bDHkVh08tgTriXh64G','views' => '2','remember_token' => NULL,'created_at' => '2023-02-18 14:16:03','updated_at' => '2023-02-18 17:18:36'),
            array('id' => '37','username' => 'Hans','username_slug' => 'hans','bio' => 'Park Jem Boat','email' => 'elfaradihans1@gmail.com','password' => '$2y$10$4FrwEf0TQlHCAgSRHnPxqOJtyMe4ChZgNF9XnnAuStQTXXo9pfVRW','views' => '1','remember_token' => NULL,'created_at' => '2023-02-18 17:21:03','updated_at' => '2023-02-19 00:20:13')
        );

        // for ($i=1; $i < count($users); $i++) {
        //     // DB::table('users')->insert([
        //     //     'username' => $users[$i]['username'],
        //     //     'username_slug' => Str::slug($users[$i]['username']),
        //     //     'email' => $users[$i]['email'],
        //     //     'password' => $users[$i]['password'],
        //     // ]);
        //     DB::table('appearances')->insert([
        //         'user_id' => $i,
        //     ]);
        // }

        $users = User::all();

        foreach ($users as $user) {
            $url = 'https://ui-avatars.com/api/?name=' . $user->username . '&background=random&rounded=true&size=112';
            $user->addMediaFromUrl($url)->toMediaCollection('users');
        }

    }
}
