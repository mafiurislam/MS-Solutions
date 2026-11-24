<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class MsSolutionsWebsiteTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        // Seed initial data
        $this->seed(DatabaseSeeder::class);
    }

    public function test_public_pages_load_successfully(): void
    {
        $urls = ['/', '/about', '/services', '/portfolios', '/blog', '/testimonials', '/faq', '/contact'];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    public function test_contact_form_submission(): void
    {
        $response = $this->postJson('/contact', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '9876543210',
            'subject' => 'Website Inquiry',
            'website_type' => 'Business Website',
            'budget' => '₹10,000 – ₹25,000',
            'message' => 'Hello, I want to develop a business website with MS Solutions.',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
    }

    public function test_admin_login_with_provided_credentials(): void
    {
        // 1. Visit login page
        $response = $this->get('/login');
        $response->assertStatus(200);

        // 2. Submit credentials (Username: Mafiur, Password: 12345678)
        $loginResponse = $this->post('/login', [
            'login' => 'Mafiur',
            'password' => '12345678',
        ]);

        $loginResponse->assertRedirect('/admin');
        $this->assertAuthenticated();
    }

    public function test_admin_dashboard_and_sections_accessible(): void
    {
        $admin = User::where('username', 'Mafiur')->first();

        $this->actingAs($admin)
            ->get('/admin')
            ->assertStatus(200)
            ->assertSee('Welcome, Mafiur');

        $this->actingAs($admin)
            ->get('/admin/portfolios')
            ->assertStatus(200)
            ->assertSee('All Portfolios');

        $this->actingAs($admin)
            ->get('/admin/sections')
            ->assertStatus(200)
            ->assertSee('Interactive Section-Wise Content Editor');
    }

    public function test_portfolio_crud_lifecycle(): void
    {
        $admin = User::where('username', 'Mafiur')->first();

        // 1. Create Portfolio
        $createResponse = $this->actingAs($admin)->post('/admin/portfolios', [
            'title' => 'Test Tech Platform',
            'category' => 'Web App',
            'project_url' => 'https://testplatform.com',
            'description' => 'A custom built web application',
            'order' => 99,
            'is_featured' => 1,
        ]);

        $createResponse->assertRedirect('/admin/portfolios');
        $this->assertDatabaseHas('portfolios', ['title' => 'Test Tech Platform']);

        $portfolio = Portfolio::where('title', 'Test Tech Platform')->first();

        // 2. Edit Portfolio
        $updateResponse = $this->actingAs($admin)->put('/admin/portfolios/' . $portfolio->id, [
            'title' => 'Updated Tech Platform',
            'category' => 'E-Commerce',
            'project_url' => 'https://testplatform.com/updated',
            'description' => 'Updated description',
            'order' => 100,
            'is_featured' => 1,
        ]);

        $updateResponse->assertRedirect('/admin/portfolios');
        $this->assertDatabaseHas('portfolios', ['title' => 'Updated Tech Platform']);

        // 3. Delete Portfolio
        $deleteResponse = $this->actingAs($admin)->delete('/admin/portfolios/' . $portfolio->id);
        $deleteResponse->assertRedirect('/admin/portfolios');
        $this->assertDatabaseMissing('portfolios', ['id' => $portfolio->id]);
    }
}
