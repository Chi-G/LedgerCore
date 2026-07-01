# LedgerCore — AI Augmented Core Banking System

LedgerCore is a single Laravel application simulating a bank's internal ledger. It is containerized with Laravel Sail / Docker and deployed live at [ledger.forahia.com](https://ledger.forahia.com) with role-based demo access.

## Core Design Decisions

### 1. Strict Immutable Double-Entry Ledger
The system completely avoids a mutable `balance` column on the `accounts` table. Instead, the balance is always derived on-the-fly by calculating the difference between sum of credits and sum of debits. Every transaction strictly generates two immutable `ledger_entries` (one credit, one debit) wrapped within a database transaction, eliminating an entire class of balance-integrity bugs.

### 2. Concurrency Safety
During a transfer, the system explicitly acquires a pessimistic write lock using `$account->lockForUpdate()` within the `DB::transaction()`. This ensures that two concurrent withdrawal requests for the exact same account are serialized. The second request will block until the first commits, at which point the balance is accurately re-evaluated, preventing double-spend and negative balances.

### 3. Role-Based Least-Privilege Access
The application enforces strict role-based least-privilege access (Customer, Teller, Auditor, Manager) via Middleware and Laravel Policies. 
- **Customers** are strictly restricted to viewing and transferring from their own accounts. 
- **Tellers** can initiate transfers for customers.
- **Auditors** have global read-only access to audit ledger activity.
- **Managers** have global access and can utilize AI explanation tools. 

### 4. Database Indexing & Performance
To guarantee fast transaction history queries and limit scan depths, a composite index `(account_id, created_at)` was utilized on the `ledger_entries` table.

I measured the performance difference using MySQL `EXPLAIN` against 100,000 seeded ledger entries:

**Before Index:**
- **type**: ALL (Full Table Scan)
- **rows**: 198,816
- **Extra**: Using where; Using filesort
*The database loaded the entire table and performed an expensive in-memory sort.*

**After Composite Index:**
- **type**: ref
- **rows**: 99,528
- **Extra**: Backward index scan
*The database utilized the index for both the look-up (`account_id = X`) and the descending sort order without `filesort`!*

### 5. Filtered Transaction History
The transaction history endpoint uses `when()` queries for dynamic date and type filters, supported perfectly by the index.

### 6. Reports with Joins
The application utilizes raw SQL `JOIN` methods and database `GROUP BY` logic to determine dormant customers (0 transactions in the month). This shifts aggregation logic to the database engine rather than loading large Eloquent collections in memory.

### 7. Form Request Validation
`TransferRequest` strictly guarantees payloads are typed and validated correctly before execution. It requires differing source/destination IDs, numeric amounts, and globally unique transaction references to guarantee idempotency.

### 8. AI-Powered Risk Analysis & Ledger Explainers
LedgerCore integrates the `laravel/ai` SDK to build two AI agents. Both are strictly designed as **advisory layers with zero write access** to financial records:
- **RiskAnalyzer:** Pre-transaction risk scoring (0-100) with Approve/Review/Reject recommendations based on transaction volume, amounts, and destination logic.
- **Explainable (LedgerExplainer):** Plain-English translation of raw double-entry data for non-technical auditors, available on the Manager dashboard.

---

### Tech Stack
- **Backend:** Laravel 13, PHP 8.4
- **Database:** MySQL
- **AI & Tooling:** Laravel AI SDK, Laravel Boost
- **Frontend:** Tailwind CSS
- **Testing:** Pest
- **Infrastructure:** Laravel Sail / Docker

> **Note:** LedgerCore currently runs on **Laravel 13** and requires **PHP 8.4+** to operate, utilizing native Docker containers via Laravel Sail.
