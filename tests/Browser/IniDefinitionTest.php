<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IniDefinitionTest extends DuskTestCase
{
    /**
     *
     * @return void
     */
    public function testIniDefinition()
    {
        $faker = \Faker\Factory::create();

        $this->browse(function (Browser $browser) use ($faker) {
            $iniTypeName = ucwords($faker->word() . ' ' . $faker->word());

            $browser->visit('/')
                ->click('#nav-define')
                ->assertSee('Ini File Types')
                ->click("#btn-add-new-file-type")
                ->whenAvailable('.modal-dialog', function ($modal) use ($iniTypeName) {
                    $modal->assertSee('New INI Type')
                          ->type('name', $iniTypeName)
                          ->type('description', 'Testing INI Type definitions')
                          ->pause(100)
                          ->press('#submit');
                })
                ->pause(100)
                ->assertSee($iniTypeName)
                ->pause(100);

            $anchorSelector = '#a_' . snake_case($iniTypeName);
            $browser->scrollToElement($anchorSelector)
                ->click($anchorSelector)
                ->assertSee($iniTypeName)
                ->assertSee('Sections')
                ->pause(100);

            /* Add Ini Sections */
            $iniSectionName = ucwords($faker->word() . ' ' . $faker->word());
            $this->createIniSectionDefinition($browser, $iniSectionName);

            $iniSectionName = ucwords($faker->word() . ' ' . $faker->word());
            $this->createIniSectionDefinition($browser, $iniSectionName);

            /* Add Ini Section Keys */
            $anchorSelector = '#a_' . snake_case($iniSectionName);
            $browser->scrollToElement($anchorSelector)
                ->click($anchorSelector)
                ->assertSee($iniSectionName)
                ->pause(100);

            $iniSectionKeyName = $faker->word();
            $this->createIniSectionKeyDefinition($browser, $iniSectionKeyName);

            $iniSectionKeyName = $faker->word();
            $this->createIniSectionKeyDefinition($browser, $iniSectionKeyName);

            $browser->pause(5000);
        });
    }

    /**
     *
     * @param  Browser $browser
     * @param  string  $iniSectionName
     * @return void
     */
    protected function createIniSectionDefinition(Browser $browser, $iniSectionName)
    {
        $browser->scrollToElement('#btn-add-new-section')
            ->press('#btn-add-new-section')
            ->whenAvailable('.modal-dialog', function ($modal) use ($iniSectionName) {
                $modal->assertSee('New Section')
                ->type('name', $iniSectionName)
                ->type('description', 'Testing INI Section definitions')
                ->pause(100)
                ->press('#submit');
            })
            ->pause(500)
            ->assertSee($iniSectionName)
            ->pause(500);
    }

    protected function createIniSectionKeyDefinition(Browser $browser, $iniSectionKeyName)
    {
        $browser->scrollToElement('#btn-add-new-key')
            ->press('#btn-add-new-key')
            ->whenAvailable('.modal-dialog', function ($modal) use ($iniSectionKeyName) {
                $modal->assertSee('New Key')
                ->type('name', $iniSectionKeyName)
                ->type('description', 'Testing INI Section Key definitions')
                ->pause(100)
                ->press('#submit');
            })
            ->pause(500)
            ->assertSee($iniSectionKeyName)
            ->pause(500);
    }
}
