<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        DB::table('incomes')->delete();
        DB::table('expenses')->delete();
        DB::table('categories')->delete();
        DB::table('users_roles')->delete();
        DB::table('users')->delete();
        DB::table('roles')->delete();

        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('UsersRolesTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ExpensesTableSeeder');
        $this->call('IncomesTableSeeder');
    }
}

class RolesTableSeeder extends Seeder
{
    public function run() {
        Role::create(array('name' => 'admin'));
        Role::create(array('name' => 'reporter'));
        Role::create(array('name' => 'viewer'));
    }
}

class UsersTableSeeder extends Seeder
{
    public function run() {
        $user = new User();
        $user->name = 'admin';
        $user->password = Hash::make('admin123');
        $user->save();

        $user = new User();
        $user->name = 'reporter';
        $user->password = Hash::make('reporter123');
        $user->save();

        $user = new User();
        $user->name = 'viewer';
        $user->password = Hash::make('viewer123');
        $user->save();
    }
}

class UsersRolesTableSeeder extends Seeder
{
    public function run() {
        $admin_role_id = DB::table('roles')->select('role_id')->where('name', 'admin')->first()->role_id;
        $reporter_role_id = DB::table('roles')->select('role_id')->where('name', 'reporter')->first()->role_id;
        $viewer_role_id = DB::table('roles')->select('role_id')->where('name', 'viewer')->first()->role_id;

        $admin_user_id = DB::table('users')->select('user_id')->where('name', 'admin')->first()->user_id;
        $reporter_user_id = DB::table('users')->select('user_id')->where('name', 'reporter')->first()->user_id;
        $viewer_user_id = DB::table('users')->select('user_id')->where('name', 'viewer')->first()->user_id;

        foreach (array($admin_role_id, $reporter_role_id, $viewer_role_id) as $role_id) {
            $user_role = new UserRole();
            $user_role->user_id = $admin_user_id;
            $user_role->role_id = $role_id;
            $user_role->save();
        }

        foreach (array($reporter_role_id, $viewer_role_id) as $role_id) {
            $user_role = new UserRole();
            $user_role->user_id = $reporter_user_id;
            $user_role->role_id = $role_id;
            $user_role->save();
        }

        $user_role = new UserRole();
        $user_role->user_id = $viewer_user_id;
        $user_role->role_id = $viewer_role_id;
        $user_role->save();
    }
}

class CategoriesTableSeeder extends Seeder
{
    public function run() {
        $cat = new Category();
        $cat->category_id = 'fd';
        $cat->name = 'Food';
        $cat->name_short = 'Food';
        $cat->order_pos = 1;
        $cat->descr = 'It\'s about eating';
        $cat->save();

        $cat = new Category();
        $cat->category_id = 'hh';
        $cat->name = 'Houshold';
        $cat->name_short = 'Houshold';
        $cat->order_pos = 2;
        $cat->descr = 'Houshold related expenses';
        $cat->save();

        $cat = new Category();
        $cat->category_id = 'el';
        $cat->name = 'Electronics';
        $cat->name_short = 'Electr';
        $cat->order_pos = 3;
        $cat->descr = 'TV, computers, cameras';
        $cat->save();
    }
}

class ExpensesTableSeeder extends Seeder
{
    public function run() {
        $reporter_user_id = DB::table('users')->select('user_id')->where('name', 'reporter')->first()->user_id;

        $expense = new Expense();
        $expense->category_id = 'fd';
        $expense->user_id = $reporter_user_id;
        $expense->create_date = new DateTime();
        $expense->amount = 55.75;
        $expense->descr = 'McDonald\'s';
        $expense->save();

        $expense = new Expense();
        $expense->category_id = 'fd';
        $expense->user_id = $reporter_user_id;
        $expense->create_date = new DateTime();
        $expense->amount = 123.45;
        $expense->descr = 'Sausages';
        $expense->save();

        $expense = new Expense();
        $expense->category_id = 'el';
        $expense->user_id = $reporter_user_id;
        $expense->create_date = new DateTime();
        $expense->amount = 4500;
        $expense->descr = 'new iPhone';
        $expense->save();
    }
}

class IncomesTableSeeder extends Seeder
{
    public function run() {
        $reporter_user_id = DB::table('users')->select('user_id')->where('name', 'reporter')->first()->user_id;

        $income = new Income();
        $income->user_id = $reporter_user_id;
        $income->create_date = new DateTime();
        $income->amount = 12345.67;
        $income->descr = 'Salary';
        $income->save();

        $income = new Income();
        $income->user_id = $reporter_user_id;
        $income->create_date = new DateTime();
        $income->amount = 200.50;
        $income->descr = 'Books on eBay';
        $income->save();
    }
}
