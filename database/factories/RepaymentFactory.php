<?php

namespace Database\Factories;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repayment>
 */
class RepaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loan_id' => Loan::inRandomOrder()->first()->id,
            'amount' => $this->faker->numberBetween(1, 1_000_000_000),
            'due_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['PENDING', 'PAID']),
        ];
    }
}
