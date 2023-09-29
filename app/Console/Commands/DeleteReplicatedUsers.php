<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class DeleteReplicatedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteReplicatedUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina usuarios replicados (identifiers, human_names, users)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::withTrashed()->get();
        foreach($users as $user){
            
            // if($user->identifiers->count()>0){
            //     foreach($user->identifiers as $key => $identifier){
            //         dd($key);
            //         if($key>0){
            //             // $identifier->forcedelete();
            //         }
            //     }
            // }

            // $count = 0;
            // if(!->humanNames->empty()){
            //     print_r($user->actualofficialhumanname);
            //     if(!$user->actualofficialhumanname){
            //         print_r($user->id . " ");
            //     }
                
            // }

            // if($user->text == "" || $user->text == "  " || $user->text == null){
            //     if($user->actualofficialhumanname){
            //         $user->text = $user->actualofficialhumanname->text;
            //         $user->given = $user->actualofficialhumanname->given;
            //         $user->fathers_family = $user->actualofficialhumanname->fathers_family;
            //         $user->mothers_family = $user->actualofficialhumanname->mothers_family;
            //         $user->save();
            //     }else{
            //         print_r($user->addresses . " ");
            //         $user->forceDelete();
            //     }
                
            // }
            

            // if($user->text == "" || $user->text == "  "){
            //     foreach($user->addresses as $address){
            //         $address->forceDelete();
            //     }

            //     foreach($user->contactPoints as $contactPoint){
            //         $contactPoint->forceDelete();
            //     }

            //     foreach($user->practitioners as $practitioner){
            //         $practitioner->forceDelete();
            //     }
                
            foreach($user->identifiers as $identifier){
                $identifier->forceDelete();
            }
                
                
            //     $user->forceDelete();
        }

    }
}
