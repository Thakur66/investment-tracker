# Project Context

## Application
Investment Tracker

## Purpose
Simple investment portfolio tracking application.

## Technology
- Laravel 13
- PHP 8.3
- MySQL
- Blade
- Tailwind CSS
- JavaScript
- Vite

## Development Environment
- Windows
- Laragon
- Apache
- MySQL
- phpMyAdmin

## Architecture
- Laravel MVC
- Controllers handle request/business orchestration
- Models represent database entities
- Blade handles UI
- Services contain reusable business calculations

## Important Models
- Category
- InvestmentType
- Investment

## Important Relationships
Category
  └── InvestmentTypes
        └── Investments

## Important Calculations

Gain/Loss:
Current Value - Invested Amount

Return %:
(Gain/Loss / Invested Amount) × 100

## UI Conventions

- Dashboard sections use card layout
- Tables appear inside white cards
- Table headers use grey styling
- Numeric columns are right aligned
- Gain/Loss:
  - positive → green
  - negative → red
  - zero → grey
- Return %:
  - positive → green
  - negative → red
  - zero → grey
- Edit button → blue
- Delete button → red
- Mandatory fields → red asterisk
- Validation errors → red
- Investment Type is dependent on Category

## Development Rules

- Keep the application simple.
- Avoid unnecessary features.
- Do not modify unrelated functionality.
- Inspect existing code before changing it.
- Preserve existing behaviour unless the task explicitly changes it.
- Test every completed task.
- Update WORK_ITEMS.md after successful testing.
- Commit completed work to Git.