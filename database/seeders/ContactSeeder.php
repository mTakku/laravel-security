<?php

namespace Database\Seeders;

Use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where("email", "farel@localhost")->firstOrFail();

        $contact = new Contact();
        $contact->name = "Test Contact";
        $contact->email = "Test@localhost";
        $contact->user_id = $user->id;
        $contact->save();

    }
}
