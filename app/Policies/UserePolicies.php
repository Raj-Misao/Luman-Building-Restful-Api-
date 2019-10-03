<?php
namespace App\Policies;
use App\User;
class UserPolicy{
    public function update(User $user,User $muser){
        return $user->id === $muser->id;
    }
}
?>