<?php
Class Hero {
    // access modifier pada oop ada 3 : public, private, protected

    // attribut / properti
    public $nama ;
    public $health ;
    public $damage;
    public $level = 1 ;

    // constructor adalah method yang secara otomatis ketika objek dibuat
    public function __construct($nama, $health, $damage)
    {
        $this->nama = $nama;
        $this->health = $health;
        $this->damage = $damage;
    }
    //method untuk menampilkan info darai hero
    public function getinfo(){
        echo "<br> Nama:" . $this->nama;
        echo "<br> HP:" . $this->health;
        echo "<br> Dameg:" . $this->damage;
        echo "<br> Level:" . $this->level;
    }

    //method untuk naik 1 level
    public function levelup($number){
        $this->level = $this ->level + $number;
        $this->health = $this-> health + (200 * $number);
        $this->damage = $this-> damage + (50 * $number);
    }
}

 // membuat objek dari class hero memakai New
 $hero1 = new Hero("Alucard", 3200, 200);
 
 $hero2 = new Hero("Franco", 5200, 50);

 $hero1->getinfo();
 
 echo "<hr>";

 $hero1->levelup(3);

 $hero1->getinfo();
 echo "<hr>";

 echo $hero1->level;