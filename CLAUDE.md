# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

**Initial setup:**
```bash
composer run setup
```

**Run all dev services concurrently** (server, queue, log watcher, Vite):
```bash
composer run dev
```

**Run tests:**
```bash
composer run test
# or a specific test file:
php artisan test --filter=ExampleTest
```

**Lint/format PHP:**
```bash
./vendor/bin/pint
```

**Database:**
```bash
php artisan migrate
php artisan migrate:fresh --seed
```

**Build frontend assets:**
```bash
npm run build   # production
npm run dev     # watch mode (already included in composer run dev)
```

## Architecture

This is a **Laravel 12 + Filament v5** application. The only public-facing route is the welcome page (`/`); all administration happens through the Filament admin panel at `/admin`.

### Filament resource structure

Filament resources follow a separated pattern — each resource splits its UI logic across dedicated classes rather than keeping everything in the resource file:

```
app/Filament/Resources/{Model}/
├── {Model}Resource.php          # registers pages, declares model binding
├── Pages/                       # CRUD page classes (List, Create, Edit, View)
├── Schemas/
│   ├── {Model}Form.php          # form field definitions
│   └── {Model}Infolist.php      # read-only view field definitions
└── Tables/
    └── {Model}Table.php         # table columns, filters, actions
```

The `AdminPanelProvider` auto-discovers resources in `app/Filament/Resources`, pages in `app/Filament/Pages`, and widgets in `app/Filament/Widgets` — no manual registration needed when adding new ones.

### Database

Development and production use SQLite (`database/database.sqlite`). Tests use SQLite in-memory (configured in `phpunit.xml`).

### Frontend

Tailwind CSS v4 is integrated via the `@tailwindcss/vite` plugin. Entry points are `resources/css/app.css` and `resources/js/app.js`, compiled by `laravel-vite-plugin`.
