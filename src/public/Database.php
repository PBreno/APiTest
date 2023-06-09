<?php

class Database
{
//    private string $host;
//    private  string $name;
//    private  string $user;
//    private  string $password;


    public function __construct( private string $host,
                                 private string $name,
                                 private string $user,
                                 private string $password)
    {

    }

    public function getConnection(): PDO
    {
        $dns = "mysql:host={$this->host};dbname={$this->name}";

        return new PDO($dns, $this->user, $this->password);
    }

}