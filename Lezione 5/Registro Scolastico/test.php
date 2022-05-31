<?php

echo password_hash('password', PASSWORD_BCRYPT) . PHP_EOL;

die;


if (password_verify('ciaociao!', $hash)) {
    echo 'La password è corretta';
} else {
    echo 'La password non è corretta';
}


echo PHP_EOL;
