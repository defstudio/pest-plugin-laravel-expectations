# CONTRIBUTING

Contributions are welcome, and are accepted via pull requests.
Please review these guidelines before submitting any pull requests.

## Process

1. Fork the project
2. Create a new branch
3. Code, test, commit and push
4. Open a pull request detailing your changes. Make sure to follow the [template](.github/PULL_REQUEST_TEMPLATE.md)
5. Open a pull request to update the [documentation repository](https://github.com/def-studio/pest-plugin-laravel-expectations-docs) according to the PR changes
## Guidelines

* Please ensure the coding style running `composer lint`.
* Send a coherent commit history, making sure each individual commit in your pull request is meaningful.
* You may need to [rebase](https://git-scm.com/book/en/v2/Git-Branching-Rebasing) to avoid merge conflicts.
* Please remember that we follow [SemVer](http://semver.org/).

## Setup

Clone your fork, then install the dev dependencies:
```bash
composer install
```
## Lint

Lint your code:
```bash
composer lint
```
## Tests

Run all tests:
```bash
composer test
```

Check types:
```bash
composer test:types
```

Unit tests:
```bash
composer test:unit
```
