<?php
class NerdsTableSeeder extends Seeder {

    public function run()
    {
        for($i=0; $i<200;$i++){
            $nerds = new Nerd;
            $nerds->name = 'tyanhly' . $i;
            $nerds->email = "tyanhly$i@gmail.com";
            $nerds->nerd_level = "1";
            if(! $nerds->save()) {
                echo "add Nerd $i fail\n";
                 print_r((array)$nerds->errors());
            } else {
                echo "add Nerd $i success \n";
            }
        }
        echo "Add Nerd Done!";
    }
}