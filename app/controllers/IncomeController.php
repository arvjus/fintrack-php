<?php

use Fintrack\Storage\Services\IncomeService as IncomeService;

class IncomeController extends BaseController
{
    public function __construct(IncomeService $incomeService) {
         $this->incomeService = $incomeService;
    }

    /* get functions */
    public function recentIncome()
    {
        $incomes = $this->incomeService->get(15);
        $this->layout->main = View::make('incomes.recent')->with(compact('incomes'));
    }

    public function listIncome()
    {
        $incomes = $this->incomeService->get(15);
        $this->layout->main = View::make('incomes.list')->with(compact('incomes'));
    }

    public function newIncome()
    {
        $this->layout->main = View::make('incomes.new');
    }

    public function editIncome(Income $income)
    {
        $this->layout->main = View::make('incomes.edit')->with(compact('income'));
    }

    public function deleteIncome(Income $income)
    {
        $this->layout->main = View::make('incomes.delete')->with(compact('income'));
    }


/*
    public function save() {
        $incomes = new Income();
//        $incomes->create_date = Input::get('create_date');
//        $incomes->amount = Input::get('amount');

        // do validation
        if ($incomes->amount == 0.0) {
            // Forward to the view
        }

        $view = View::make('incomes');
        $view->incomes = $incomes;
        $view->error = Lang::get('messages.error.amount.min', array('amount' => 0.0));
        return $view;


		long days = Math.abs(new Date().getTime() - incomes.getCreateDate().getTime())/1000/3660/24;
		if (days > 500) {
			error = Messages.getMessageResourceString("messages", Locale.US, "error.date.range", new Long[] { days });
			return "incomes";
		}

		// persist/update entity
		if (preinitId == null) {
			incomes.setUserId(request.getUserPrincipal().getName());
			incomeDao.save(incomes);
			message = Messages.getMessageResourceString("messages", Locale.US, "status.added.incomes", null);

			// Reset to default
			incomes = new Income();
			return execute(request, response);
		} else {
			incomes.setIncomeId(preinitId);
			incomes.setUserId(request.getUserPrincipal().getName());
			incomeDao.save(incomes);
			message = Messages.getMessageResourceString("messages", Locale.US, "status.updated.incomes", new Integer[] {preinitId});
		}

    }
*/
}