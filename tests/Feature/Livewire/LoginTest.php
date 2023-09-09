<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Auth\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_login_page(): void
    {
        $this->get(route('login'))->assertSuccessful()->assertSeeLivewire(Login::class);
    }

    public function test_can_login()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)->set('email', $user->email)->set('password', 'password')->call('login');

        $this->assertTrue(
            auth()->user()->email == $user->email
        );
    }

    // public function test_is_invalid_login()
    // {
    //     $user = User::factory()->create();

    //     Livewire::test(Login::class)->set('email', $user->email)->set('password', 'password123')->call('login')->assertSee('Email or password is wrong');
    // }

    public function test_is_redirected_after_login()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)->set('email', $user->email)->set('password', 'password')->call('login')->assertRedirect('/links');
    }

    public function test_is_redirected_if_already_logged_in()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('login'))->assertRedirect('/home');
    }

    public function test_is_email_validated()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)->set('password', 'password')->call('login')->assertHasErrors(['email' => 'required']);
    }

    public function test_is_password_validated()
    {
        $user = User::factory()->create();

        Livewire::test(Login::class)->set('email', $user->email)->call('login')->assertHasErrors(['password' => 'required']);
    }
}
