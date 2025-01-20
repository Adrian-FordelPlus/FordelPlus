use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;

class UserCompanySeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1);
        $company = Company::find(1);

        $user->companies()->attach($company->id, ['role_in_company' => 'Admin']);
    }
}
	category_id
	name
	parent_category_id
	slug