<?php 

function profile($user){

    return <<<HTML
<style>
.profile{
    background-color: rgba(0,0,0,0.5);
    display: flex;
    width: 200px;
    height: 200px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 10px;
}
</style>
<div class="profile">
    <div>
        <span><b>Name: </b>{$user['name']}</span>
    </div>
    <div>
    <span><b>desc: </b> {$user['desc']}</span>
</div>
</div>
HTML;


}


