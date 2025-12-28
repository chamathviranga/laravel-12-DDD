# Laravel 12 Domain Driven Design

```
.
├── app
│   ├── Domains
│   │   ├── Blog
│   │   │   ├── Adapters
│   │   │   │   └── EloquentCategoryRepository.php
│   │   │   ├── Domain
│   │   │   │   ├── Controllers
│   │   │   │   │   └── BlogController.php
│   │   │   │   ├── DTO
│   │   │   │   │   └── CategoryDTO.php
│   │   │   │   ├── Migrations
│   │   │   │   │   └── 2025_12_27_233259_create_category_table.php
│   │   │   │   ├── Models
│   │   │   │   │   └── Blog.php
│   │   │   │   ├── Ports
│   │   │   │   │   └── CategoryRepository.php
│   │   │   │   ├── Providers
│   │   │   │   │   └── BlogServiceProvider.php
│   │   │   │   └── Services
│   │   │   │       └── BlogService.php
│   │   │   └── routes.php
│   │   └── Category
│   │       ├── Domain
│   │       │   ├── Adapters
│   │       │   ├── Controllers
│   │       │   │   └── CategoryController.php
│   │       │   ├── Migrations
│   │       │   │   └── 2025_12_27_233425_create_blogs_table.php
│   │       │   ├── Models
│   │       │   │   └── Category.php
│   │       │   ├── Ports
│   │       │   └── Services
│   │       │       └── CategoryService.php
│   │       └── routes.php
│   ├── Http
│   │   └── Controllers
│   │       └── Controller.php
│   ├── Models
│   │   └── User.php
│   └── Providers
│       ├── AppServiceProvider.php
│       └── DomainServiceProvider.php
├── artisan
├── bootstrap
│   ├── app.php
│   ├── cache
│   │   ├── packages.php
│   │   └── services.php
│   └── providers.php
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   └── session.php


```

- This project follows a Modular Domain-Driven Design (DDD) combined with a Hexagonal Architecture (Ports and Adapters). This structure is designed to decouple business logic from infrastructure (like the database or external APIs) and ensure strict boundaries between different domains.

# 🏗️ Architecture Overview
- The application is split into independent Domains (e.g., Blog, Category). Each domain is self-contained and communicates with others through well-defined interfaces.

- Directory Breakdown
    - Ports/: Contains interfaces that define what the domain needs (e.g., CategoryRepository). The domain logic only knows about these interfaces.

    - Adapters/: Contains the concrete implementation of the Ports (e.g., EloquentCategoryRepository). This is where Laravel-specific code (Eloquent) lives.

    - Domain/Services/: Orchestrates business logic and interacts with Ports.

    - Domain/DTO/: Data Transfer Objects used to move data between layers without exposing Eloquent models.

    - Providers/: Handles dependency injection, binding the Ports to the Adapters.

# 🛠️ Key Design Principles

   - Dependency Inversion: High-level domain logic does not depend on low-level Eloquent models. It depends on abstractions (Ports).

   - Domain Isolation: The Blog domain cannot directly query the Category model. It must go through its own CategoryRepository port, which is then fulfilled by an adapter.

   - Future Proofing: This setup allows the application to be transitioned into a Microservices architecture easily, as domain boundaries are already strictly enforced.

# ⚠️ Development Note (Namespace Consistency)

- To avoid BindingResolutionException errors, ensure your file structure exactly matches your PSR-4 namespaces.