<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

   
            Setting::insert([
                
                ['name' =>'app_name','label'=>'APP NAME','value'=> 'Rahul Jat','type' => 'string'  ],
                ['name' =>'user_logo','label'=>'User Logo','value'=> 'dist/img/user3-128x128.jpg','type' => 'file'  ],
                ['name' =>'login-screen-logo','label'=>'Login screen logo','value'=> 'auth/images/img-01.png','type' => 'file'  ],
                ['name' =>'logo','label'=>'Logo','value'=> 'dist/img/AdminLTELogo.png','type' => 'file'  ],
                ['name' =>'favicon','label'=>'Favicon','value'=> 'auth/images/icons/favicon.ico','type' => 'file'  ],
                ['name' =>'facebook_url','label'=>'Facebook url','value'=> '','type' => 'string'  ],
                ['name' =>'twitter_url','label'=>'Twitter url','value'=> '','type' => 'string'  ],
                ['name' =>'youtube_url','label'=>'Youtube url','value'=> '','type' => 'string'  ],

            ]);
    }
}
