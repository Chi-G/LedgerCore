<?php

namespace App\Ai\Agents;

use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class RiskAnalyzer implements Agent, Conversational, HasTools
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return 'You are an AI Risk Analysis agent for a cross-border payment platform. 
Your job is to evaluate requested transfers before they are processed.
You must return a JSON response containing:
- "risk_score": An integer from 0 (very safe) to 100 (extremely risky).
- "recommendation": A short string ("Approve", "Review", or "Reject").
- "reasoning": A plain-english explanation of your score.

Evaluate based on factors like:
- Extremely large amounts relative to typical balances.
- "Round numbers" for unusually large sums.
- Suspicious recipient names or frequencies, if provided.';
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [];
    }
}
