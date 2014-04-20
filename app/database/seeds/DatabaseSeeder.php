<?php

/*
 * Seed data for unitest.
 */

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        $this->call('EmptySeeder');
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('UsersRolesTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ExpensesTableSeeder');
        $this->call('IncomesTableSeeder');
    }
}

class EmptySeeder extends Seeder
{
    public function run() {
        DB::table('incomes')->delete();
        DB::table('expenses')->delete();
        DB::table('categories')->delete();
        DB::table('users_roles')->delete();
        DB::table('users')->delete();
        DB::table('roles')->delete();
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
        saveModel($user);

        $user = new User();
        $user->name = 'reporter';
        $user->password = Hash::make('reporter123');
        saveModel($user);

        $user = new User();
        $user->name = 'viewer';
        $user->password = Hash::make('viewer123');
        saveModel($user);
    }
}

class UsersRolesTableSeeder extends Seeder
{
    public function run() {

        $admin_role_id = DB::table('roles')->select('role_id')->where('name', 'admin')->first()->role_id;
        $reporter_role_id = DB::table('roles')->select('role_id')->where('name', 'reporter')->first()->role_id;
        $viewer_role_id = DB::table('roles')->select('role_id')->where('name', 'viewer')->first()->role_id;

        $admin_user = User::where('name', 'admin')->first();
        foreach (array($admin_role_id, $reporter_role_id, $viewer_role_id) as $role_id) {
            $admin_user->roles()->attach($role_id, array('user_id' => $admin_user->user_id));
        }

        $reporter_user = User::where('name', 'reporter')->first();
        foreach (array($reporter_role_id, $viewer_role_id) as $role_id) {
            $reporter_user->roles()->attach($role_id, array('user_id' => $reporter_user->user_id));
        }

        $viewer_user = User::where('name', 'viewer')->first();
        $viewer_user->roles()->attach($viewer_role_id, array('user_id' => $viewer_user->user_id));
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
        saveModel($cat);

        $cat = new Category();
        $cat->category_id = 'hh';
        $cat->name = 'Houshold';
        $cat->name_short = 'Houshold';
        $cat->order_pos = 2;
        $cat->descr = 'Houshold related expenses';
        saveModel($cat);

        $cat = new Category();
        $cat->category_id = 'el';
        $cat->name = 'Electronics';
        $cat->name_short = 'Electr';
        $cat->order_pos = 3;
        $cat->descr = 'TV, computers, cameras';
        saveModel($cat);
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
        saveModel($expense);

        $expense = new Expense();
        $expense->category_id = 'fd';
        $expense->user_id = $reporter_user_id;
        $expense->create_date = new DateTime();
        $expense->amount = 123.45;
        $expense->descr = 'Sausages';
        saveModel($expense);

        $expense = new Expense();
        $expense->category_id = 'el';
        $expense->user_id = $reporter_user_id;
        $expense->create_date = new DateTime();
        $expense->amount = 4500;
        $expense->descr = 'new iPhone';
        saveModel($expense);
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
        saveModel($income);

        $income = new Income();
        $income->user_id = $reporter_user_id;
        $income->create_date = new DateTime();
        $income->amount = 200.50;
        $income->descr = 'Books on eBay';
        saveModel($income);
    }
}

function saveModel($model) {
    if (!$model->save() && $model->errors()) {
        print 'Errors: ' . $model->errors();
    }
}
