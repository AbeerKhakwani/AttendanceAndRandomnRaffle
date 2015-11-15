<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once "src/User.php";
    require_once "src/response.php";
    require_once "src/Restaurant.php";
    $DB = new PDO('pgsql:host=localhost;dbname=epifoodus');

    //ADD COLUMN VEGGIE AND ADMIN TO USER TABLE

  class UserTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
         {
            User::deleteAll();
            Response::deleteAll();
           Restaurant::deleteAll();
         }
        //Initialize a Store with a User and be able to get it back out of the object using getUser().
        function testGetUser()
        {
            //Arrange
            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);

            //Act
            $result = $test_User->getUsername();
            //Assert
            $this->assertEquals($user, $result);
        }
        function testsetUserName()
        { //can I change the User in the object with setUserName() after initializing it?
            //Arrange
            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);

            //No need to save here because we are communicating with the object only and not the database.
            //Act
            $test_User->setUsername("Famous Footware");
            $result = $test_User->getUsername();
            //Assert
            $this->assertEquals("Famous Footware", $result);
        }
        // //Next, let's add the Id property to our User User. Like any other property it needs a getter and setter.
        // //Create a User with the id in the constructor and be able to get the id back out.
        function testGetId()
        {
            //Arrange

            $user = "HIST100";
            $password= "Abeer";
            $id=1;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);

            //Act
            $result = $test_User->getId();
            //Assert
            $this->assertEquals(1, $result);
        }
        //Create a User with the id in the constructor and be able to change its value, and then get the new id out.
        function testSetId()
        {
            //Arrange

            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);

            //Act
            $test_User->setId(2);
            //Assert
            $result = $test_User->getId();
            $this->assertEquals(2, $result);
        }
        //
        function testSave()
        {
            //Arrange
            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin, $id);

            $test_User->save();
            //Act
            $result = User::getAll();

            //Assert
            $this->assertEquals($test_User, $result[0]);
        }
        //
        function testSaveSetsId()
        {
            //Arrange
            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);

            //Act
            //save it. Id should be assigned in database, then Userd in object.
            $test_User->save();
            //Assert
            //That id in the object should be numeric (not null)
            $this->assertEquals(true, is_numeric($test_User->getId()));
        }

        function testGetAll()
        {
            //Arrange
            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);

            $test_User->save();

             $user2 = "HIST100";
            $password2= "Abeer";
            $id2=null;
            $vegie2=0;
            $admin2=1;
            $test_User2 = new User($user2,$password2,$vegie2,$admin2 , $id2);

            $test_User2->save();

            //Act
            $result = User::getAll();
            //Assert
            $this->assertEquals([$test_User, $test_User2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            //We need some categories saved into the database so that we can make sure our deleteAll method removes them all.
            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);

            $user2 = "HIST100";
            $password2= "Abeer";
            $id2=null;
            $vegie2=0;
            $admin2=1;
            $test_User2 = new User($user2,$password2,$vegie2,$admin2 , $id2);

            $test_User2->save();
            //Act
            //Delete categories.
            User::deleteAll();
            //Assert
            //Now when we call getAll, we should get an empty array because we deleted all categories.
            $result = User::getAll();
            $this->assertEquals([], $result);
        }
        function testFind()
        {
            //Arrange
            //Create and save 2 categories.
            $user = "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);
            $test_User->save();

            $user2 = "HIST100";
            $password2= "Abeer";
            $id2=null;
            $vegie2=0;
            $admin2=1;
            $test_User2 = new User($user2,$password2,$vegie2,$admin2 , $id2);

            $test_User2->save();
            $result = User::find($test_User->getId());
            $this->assertEquals($test_User, $result);
        }
        function testUpdateUsername()
        {
            //Arrange
            $user2 = "HIST100";
            $password2= "Abeer";
            $id2=null;
            $vegie2=0;
            $admin2=1;
            $test_User2 = new User($user2,$password2,$vegie2,$admin2 , $id2);

            $test_User2->save();
            $new_name = "Home Economics";
            //Act
            $test_User2->updateUsername($new_name);
            //Assert
            $this->assertEquals("Home Economics", $test_User2->getUsername());
        }
        function testUpdatePassword()
        {
            //Arrange
            $user2 = "HIST100";
            $password2= "Abeer";
            $id2=null;
            $vegie2=0;
            $admin2=1;
            $test_User2 = new User($user2,$password2,$vegie2,$admin2 , $id2);
            $test_User2->save();

            $new_password = "abeer";
            //Act
            $test_User2->updatePassword($new_password);
            //Assert
            $this->assertEquals("abeer", $test_User2->getPassword());
        }

        function testUpdateVegie()
        {
            //Arrange
            $user2 = "HIST100";
            $password2= "Abeer";
            $id2=null;
            $vegie2=0;
            $admin2=1;
            $test_User2 = new User($user2,$password2,$vegie2,$admin2 , $id2);
            $test_User2->save();

            $new_password = 1;
            //Act
            $test_User2->updateVegie($new_password);
            //Assert
            $this->assertEquals(1, $test_User2->getVegie());
        }


        function testDeleteUser()
        {
            //Arrange

             $user= "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);
            $test_User->save();


            $user2 = "HIST100";
            $password2= "Abeer";
            $id2=null;
            $vegie2=0;
            $admin2=1;
            $test_User2 = new User($user2,$password2,$vegie2,$admin2 , $id2);
            $test_User2->save();

            //Act
            $test_User->delete();
            //Assert
            $this->assertEquals([$test_User2], User::getAll());
        }
        function testAddanswer()
        {
            //Arrange
            //We need a User and a User saved
            $user= "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);
            $test_User->save();


             $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $answer = 2;
            $restaurant_id = 1;
            $user_id = 1;
            $id2 = 1;
            $test_response = new Response($answer, $restaurant_id, $user_id, $id2);
            $test_response->save();

            $test_User->addAnswer($test_User->getId(),$test_restaurant->getId(),$test_response->getAnswer());


            $this->assertEquals($test_User->getLikes(), [$test_restaurant]);
        }
        //Now we write a test for the getStores method since we need it to be able to test the Add User method.

        //Deletes the ASSOCIATION between the User and the course in the join table
        function testgetDislike()
        {
            //Arrange
            //We need a User and a User saved
            //Arrange
            //We need a User and a User saved
            $user= "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);
            $test_User->save();


            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $answer = 0;
            $restaurant_id = 1;
            $user_id = 1;
            $id2 = 1;
            $test_response = new Response($answer, $restaurant_id, $user_id, $id2);
            $test_response->save();

            $test_User->addAnswer($test_User->getId(),$test_restaurant->getId(),$test_response->getAnswer());


            $this->assertEquals($test_User->getDisLikes(), [$test_restaurant]);
        }

        function testUpdateAnswer()
        {
            //Arrange
            //We need a User and a User saved
            //Arrange
            //We need a User and a User saved
            $user= "HIST100";
            $password= "Abeer";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);
            $test_User->save();


            $name = "Little Big Burger";
            $address = "123 NW 23rd Ave.";
            $phone = "971-289-8000";
            $price = 1;
            $vegie = 0;
            $opentime = 0900;
            $closetime = 2100;
            $id = 1;
            $test_restaurant = new Restaurant($name, $address, $phone, $price, $vegie, $opentime, $closetime, $id);
            $test_restaurant->save();

            $answer = 0;
            $restaurant_id = 1;
            $user_id = 1;
            $id2 = 1;
            $test_response = new Response($answer, $restaurant_id, $user_id, $id2);
            $test_response->save();
            $test_User->addAnswer($test_User->getId(),$test_restaurant->getId(),$test_response->getAnswer());

            $test_User->updateAnswer(2,1);

            $this->assertEquals($test_User->getDisLikes(), [$test_restaurant]);
        }

        function test_CheckUsersExists()
        {
            //Arrange
            $user= "Abeer";
            $password= "Epicodus";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);
            $test_User->save();

            $result = User::CheckIfExists($user);

            $this->assertEquals(1, $result);
        }

        function test_CheckUsersDoesNotExist()
        {
            //Arrange
            $user= "Abeer";
            $password= "Epicodus";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);
            $test_User->save();

            $new_user = "Jill";

            $result = User::CheckIfExists($new_user);

            $this->assertEquals(0, $result);
        }

        function test_CheckPasswordMatch()
        {
            //Arrange
            $user= "Abeer";
            $password= "Epicodus";
            $id=null;
            $vegie=0;
            $admin=1;
            $test_User = new User($user,$password,$vegie,$admin , $id);
            $test_User->save();

            $test_username = "Abeer";
            $test_password = "Epicodus";
            $result = User::AuthenticatePassword($test_username, $test_password);
            $this->assertEquals($test_User, $result);
        }




    }
?>
