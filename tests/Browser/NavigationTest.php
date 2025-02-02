<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\File;

class NavigationTest extends DuskTestCase
{
    use DatabaseMigrations;

    #[Test]
    public function testNavigation()
    {
        // Katalog na zrzuty ekranu
        $screenshotsDir = base_path('tests/Browser/screenshots/NavigationTestScreenshot');


        $this->browse(function (Browser $browser) use ($screenshotsDir) {
            $browser->visit('http://web-CCH/login')
                ->pause(2000) // Wstrzymaj ładowanie
                ->screenshot($screenshotsDir . '/login_page') // Zrzut ekranu strony logowania
                ->assertPathIs('/login')
                ->clickLink('Sign up here')
                ->pause(2000) // Wstrzymaj, aby upewnić się, że strona rejestracji jest załadowana
                ->screenshot($screenshotsDir . '/register_page') // Zrzut ekranu strony rejestracji
                ->assertPathIs('/register')
                ->clickLink('Log in here')
                ->pause(2000) // Wstrzymaj, aby upewnić się, że strona logowania jest załadowana
                ->screenshot($screenshotsDir . '/login_page_again') // Zrzut ekranu strony logowania po powrocie
                ->assertPathIs('/login')
                ->clickLink('Forgot your password?')
                ->pause(2000) // Wstrzymaj, aby upewnić się, że strona resetowania hasła jest załadowana
                ->screenshot($screenshotsDir . '/forgot_password_page') // Zrzut ekranu strony zapomnianego hasła
                ->assertPathIs('/forgot-password')
                ->clickLink('Log in here')
                ->pause(2000) // Wstrzymaj, aby upewnić się, że strona logowania jest załadowana
                ->screenshot($screenshotsDir . '/login_page_final') // Zrzut ekranu strony logowania na końcu
                 ->assertPathIs('/login');
        });
    }
}
