<?
   class person
   {
       public $name;
       public $weight;
       public $age;

       public function person_setter($name , $weight , $age){
        $this->name = $name;
        $this->weight = $weight;
        $this->age = $age;
       }

       public function haveameal(){
        print_r($this->name."가 밥을 먹습니다 몸무게가 10KG늘어나네요!<br>");
        $this->weight = $this->weight + 10;
       }

       public function getage(){
        print_r($this->name."가 나이를 먹습니다 한살 먹어버렸어요!<br>");
        $this->age = $this->age + 1;
       }

       public function person_info(){
        print($this->name . " 이름/몸무게 " . $this->weight . " /나이 " . $this->age."<br>");
       }

   }

   $person_1 = new person();
   $person_1->person_setter("김철수",75,23);
   $person_1->person_info();

   $person_1->haveameal();
   $person_1->getage();

   $person_1->person_info();

   print("<br><br>");

   $person_2 = new person();
   $person_2->person_setter("박영희",65,20);
   $person_2->person_info();

   $person_2->haveameal();
   $person_2->getage();

   $person_2->person_info();

?>