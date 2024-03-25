<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactAddress;
use App\Models\ContactImage;
use App\Models\User;
use App\Models\Branch;
use App\Models\Appointment;
use App\Models\AppointmentDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Tạo dữ liệu seeder cho bảng users
        User::create([
            'zalo_id' => '123456',
            'name' => 'John Doe',
            'phone' => '123456789',
            'email' => 'john@example.com',
            'role' => 1, // Role employee
            'status' => 1,
            'orders' => 0,
            'password' => bcrypt('password'),
        ]);

        User::create([
            'zalo_id' => '789012',
            'name' => 'Jane Smith',
            'phone' => '987654321',
            'email' => 'jane@example.com',
            'role' => 0, // Role user
            'status' => 1,
            'orders' => 0,
            'password' => bcrypt('password'),
        ]);

        // Tạo dữ liệu seeder cho bảng branches
        Province::create([
            'name' => 'Cần Thơ',
        ]);

        Province::create([
            'name' => 'Đồng Tháp',
        ]);

        Province::create([
            'name' => 'Vĩnh Long',
        ]);
        // Tạo dữ liệu seeder cho bảng branches
        Branch::create([
            'name' => 'Thiện Minh 1',
            'address' => 'Nguyễn Văn Cừ nd, Ninh Kiều, Cần Thơ',
            'phone_number' => '123456789',
            'province_id' => '1',
            'status' => 0, // Role user
            'orders' => 0,
        ]);

        Branch::create([
            'name' => 'Thiện Minh 2',
            'address' => 'Nguyễn Văn Linh, Ninh Kiều, Cần Thơ',
            'phone_number' => '123456789',
            'province_id' => '2',
            'status' => 0, // Role user
            'orders' => 0,
        ]);

        // Tạo dữ liệu cho Category
        Category::create([
            'category_name' => 'Electronics',
            'image_url' => 'https://example.com/images/electronics.jpg',
            'orders' => 1,
            'status' => '1',
        ]);

        Category::create([
            'category_name' => 'Books',
            'image_url' => 'https://example.com/images/books.jpg',
            'orders' => 2,
            'status' => '0',
        ]);

        // Tạo dữ liệu cho Product
        Product::create([
            'name' => 'iPhone 12',
            'description' => 'Latest iPhone model',
            'price' => 999,
            'category_id' => 1,
            'image_url' => 'https://example.com/images/iphone12.jpg',
            'status' => '0',
            'orders' => 10,
        ]);

        Product::create([
            'name' => 'Harry Potter and the Sorcerer\'s Stone',
            'description' => 'First book in the Harry Potter series',
            'price' => 15,
            'category_id' => 2,
            'image_url' => 'https://example.com/images/harrypotter.jpg',
            'status' => '1',
            'orders' => 5,
        ]);

        // Tạo dữ liệu cho bảng contacts
        Contact::create([
            'description' => 'Contact 1',
            'phone_number' => '123456789',
            'orders' => 1,
        ]);

        Contact::create([
            'description' => 'Contact 2',
            'phone_number' => '987654321',
            'orders' => 2,
        ]);

        // Tạo dữ liệu cho bảng contact_images
        ContactImage::create([
            'contact_id' => 1,
            'image_url' => 'https://example.com/image1.jpg',
            'orders' => 1,
        ]);

        ContactImage::create([
            'contact_id' => 2,
            'image_url' => 'https://example.com/image2.jpg',
            'orders' => 2,
        ]);

        // Tạo dữ liệu cho bảng contact_addresses
        ContactAddress::create([
            'contact_id' => 2,
            'address' => 'Address 1',
            'orders' => 1,
        ]);

        ContactAddress::create([
            'contact_id' => 1,
            'address' => 'Address 2',
            'orders' => 1,
        ]);

        // Tạo dữ liệu cho bảng appointments
        Appointment::create([
            'customer_id' => 1,
            'branch_id' => 1,
            'employee_id' => 2,
            'appointment_date' => '2022-01-01',
            'notes' => 'Some notes',
            'status' => 1,
            'orders' => 3,
        ]);

        // Tạo dữ liệu cho bảng appointment_details
        AppointmentDetail::create([
            'appointment_id' => 1,
            'qr_code' => 'ABC123',
            'status' => 1,
            'start_time' => '2022-01-01 08:00:00',
            'end_time' => '2022-01-01 10:00:00',
            'orders' => 5,
        ]);
    }
}
