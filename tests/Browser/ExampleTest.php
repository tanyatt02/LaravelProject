<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    //use DatabaseMigrations;
    
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                    ->type('title', 'ttt')
                    
                    ->press('Save')
                    ->assertPathIs('/admin/categories');//waitForLocation('/admin/categories', 20);
        });
    }

    public function testBasicExample2()
    {
        

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                    ->type('title', 't')
                    
                    ->press('Save')
                    ->assertSee('Количество символов в поле Заголовок должно быть не меньше 3.');
        });
    }
}
