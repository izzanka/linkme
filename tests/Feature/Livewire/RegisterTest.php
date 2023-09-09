<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Auth\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    private $email = 'test@gmail.com';

    public function test_can_view_register_page(): void
    {
        $this->get(route('register'))->assertSuccessful()->assertSeeLivewire(Register::class);
    }

    public function test_can_register()
    {
        Livewire::test(Register::class)->set('username', 'test')->set('email', $this->email)->set('password', 'password')->call('register');

        $this->assertTrue(
            auth()->user()->email == $this->email
        );
    }

    // public function test_is_invalid_register()
    // {
    //     Livewire::test(Register::class)->set('username', 'test')->set('email', $this->email)->set('password', 'password')->call('register')->assertSee('Something wrong.');
    // }

    public function test_is_redirected_after_register()
    {
        Livewire::test(Register::class)->set('username', 'test')->set('email', $this->email)->set('password', 'password')->call('register')->assertRedirect('/links');
    }

    public function test_is_redirected_if_already_registered()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('register'))->assertRedirect('/home');
    }

    public function test_is_username_validated()
    {
        Livewire::test(Register::class)->set('email', $this->email)->set('password', 'password')->call('register')->assertHasErrors(['username' => 'required']);
    }

    public function test_is_email_validated()
    {
        Livewire::test(Register::class)->set('username', 'test')->set('password', 'password')->call('register')->assertHasErrors(['email' => 'required']);
    }

    public function test_is_password_validated()
    {
        Livewire::test(Register::class)->set('username', 'test')->set('email', $this->email)->call('register')->assertHasErrors(['password' => 'required']);
    }
}
