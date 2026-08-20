# Investment Tracker App — Version 1.1 Requirements

## Goal

Improve portfolio analysis and usability while keeping the application simple, clean, and easy to understand.

## Scope

Version 1.1 will focus on portfolio analysis, filtering, sorting, and investment details.

### 1. Better Portfolio Dashboard

- Improve the existing dashboard without redesigning it completely.
- Make the existing portfolio information easier to understand.
- Preserve the current card-based layout.

### 2. Additional Portfolio Metrics

Add useful summary information that can be calculated from the existing investment data, such as:

- Number of investments.
- Best-performing investment.
- Worst-performing investment.
- Average return percentage.

Only metrics that provide clear value should be implemented.

### 3. Investment Filtering

Allow users to filter the investment listing by:

- Category.
- Investment Type.

Filtering should be simple and should not require a separate search/filter page.

### 4. Investment Sorting

Allow users to sort the investment listing by useful columns, including:

- Investment Name.
- Invested Amount.
- Current Value.
- Gain/Loss.
- Return %.
- Investment Date.

Sorting should be simple and predictable.

### 5. Better Investment Details

Improve the way an individual investment's information is presented without introducing unnecessary complexity.

Potential improvements include:

- Clearer presentation of all investment information.
- Better visibility of Gain/Loss and Return %.
- Reuse existing investment data and calculations.

### 6. User Experience Improvements

- Preserve the existing UI conventions.
- Keep navigation simple.
- Keep existing Add, Edit, and Delete workflows intact.
- Avoid feature bloat.
- Do not introduce authentication, multi-user functionality, external APIs, or unrelated features in Version 1.1.

## Technical Constraints

- Continue using Laravel MVC.
- Reuse existing models, relationships, controllers, services, and Blade views where appropriate.
- Keep business calculations in services where reusable calculations are required.
- Avoid unnecessary database schema changes.
- Preserve existing Version 1.0 functionality.

## Testing Expectations

Every Version 1.1 feature must be tested independently and then included in a complete application regression test before Version 1.1 is completed.

## Out of Scope

The following are intentionally deferred to later versions:

- Historical portfolio tracking.
- Portfolio performance history/charts based on historical snapshots.
- Advanced reports.
- Complex data visualization.
- User authentication.
- Multi-user support.
- External market-price APIs.
- Commercial installation/packaging.

## Definition of Done

Version 1.1 requirements are considered complete when the scope above is documented and converted into small, granular implementation tasks in `WORK_ITEMS.md` before development begins.