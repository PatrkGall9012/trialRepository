Welcome to Dashboard

<?php
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');
    echo 'Welcome'.' '.$udata['sender_user']; 

}
else
{
    redirect(base_url('webproj_app/login'));
}

?>

<a href="<?=base_url('webproj_app/logout')?>">Log Out</a>