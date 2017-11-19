<?php
include("src/ORMModel.php");
use PHPUnit\Framework\TestCase;

class ORMTest extends TestCase
{
    
    public function testPopulateUsers(){
        $user = new User();
        $data =[ 
            ['nombre' => 'John',
            'apellido' => 'Doe',
            'email' => 'johndoe@email.com',
            'descripcion' => 'Lorem ipsum',
            'timemodified' => mktime() ],
            
            ['nombre' => 'Jane',
            'apellido' => 'Doe',
            'email' => 'janedoe@email.com',
            'descripcion' => 'Lorem ipsum',
            'timemodified' => mktime() ],
            
            ['nombre' => 'John',
            'apellido' => 'Smith',
            'email' => 'johnsmith@email.com',
            'descripcion' => 'Lorem ipsum',
            'timemodified' => mktime() ],
            
            ['nombre' => 'Tony',
            'apellido' => 'Blanco',
            'email' => 'tblanco@email.com',
            'descripcion' => 'Lorem ipsum',
            'timemodified' => mktime() ], 
        ];

                
        $user->create(
            $data
        );
        
        $this->assertEquals( count($data), count($user->all()) );
    }
    
    public function testQueryUsersAsArrayOfObjects(){
        
        
        $user = new User();
        $res = $user->all();
        
        
        // Results in arrays
        $this->assertEquals(is_array($res), true);
        
        // Array of Users
        $this->assertContainsOnlyInstancesOf(
            User::class,
            $res
        );
    }
    
    
    public function testGetFirst(){
        $user = new User();
        $first = $user->first();
        $this->assertInstanceOf(User::class, $first);
    }
    
    public function testGetWhere(){
        $user = new User();
        $res = $user->getWhere('nombre', 'John');
        $this->assertContainsOnlyInstancesOf(
            User::class,
            $res
        );
    }
    
}