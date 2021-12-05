---
title: Changelog
description: ''
position: 5
fullscreen: false
---

All notable changes to this project will be documented in this file. For a full understanding of what changed and the PR that where merged, see also the [releases page](/releases)

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).


### [v1.7.0](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.6.5...v1.7.0) - 2021-12-05

**Added**

- `toBeSameSecondAs` expectation
- `toBeCurrentSecond` expectation

### [v1.6.5](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.6.4...v1.6.5) - 2021-11-24

**Added**

- PHP8.1 support

### [v1.6.4](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.6.2...v1.6.4) - 2021-11-23

**Fix**

- responses are authomatically wrapped in TestResponse objects when are instances of JsonReponse and RedirectResponse


### [v1.6.2](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.6.1...v1.6.2) - 2021-11-21

**Fix**

- Take given guard into account in `->toBeAuthenticated()` expectation

### [v1.6.1](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.6.0...v1.6.1) - 2021-11-20

**Changed**

- responses are authomatically wrapped in TestResponse objects when used in responses expectations

### [v1.6.0](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.5.0...v1.6.0) - 2021-11-15

**Added**

- `toBeBirthday()` expectation
- `toBeEndOfDay()` expectation
- `toBeSameModelAs()` expectation
- `toBeMidday()` expectation
- `toBeMidnight()` expectation
- `toBeStartOfDay()` expectation

### [v1.5.0](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.4.0...v1.5.0) - 2021-10-25

**Added**

- `toBeAfter()` expectation
- `toBeBefore()` expectation
- `toBeBetween()` expectation
- `toBeCurrentDay()` expectation
- `toBeCurrentMonth()` expectation
- `toBeCurrentWeek()` expectation
- `toBeCurrentYear()` expectation
- `toBeFriday()` expectation
- `toBeFuture()` expectation
- `toBeFuture()` expectation
- `toBeLastMonth()` expectation
- `toBeLastWeek()` expectation
- `toBeLastYear()` expectation
- `toBeMonday()` expectation
- `toBeNextMonth()` expectation
- `toBeNextWeek()` expectation
- `toBeNextYear()` expectation
- `toBePast()` expectation
- `toBeSameDayAs()` expectation
- `toBeSameHourAs()` expectation
- `toBeSameMonthAs()` expectation
- `toBeSameYearAs()` expectation
- `toBeSameWeekAs()` expectation
- `toBeSaturday()` expectation
- `toBeSunday()` expectation
- `toBeToday()` expectation
- `toBeThursday()` expectation
- `toBeTuesday()` expectation
- `toBeWednesday()` expectation
- `toBeWeekday()` expectation
- `toBeWeekend()` expectation
- `toHaveAllSession()` expectation
- `toHaveHeader()` expectation
- `toHaveSession()` expectation
- `toBeMissingInStorage()` expectation

**Updated**

- Documentation refactor

### [v1.4.0](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.3.0...v1.4.0) - 2021-10-21

**Added**

- `toHaveLocation()` expectation
- `toConfirmCreation()` expectation
- `toBeRedirectToSignedRoute()` expectation
- `toHaveJson()` expectation
- `toHaveExactJson()` expectation
- `toHaveJsonFragment()` expectation
- `toHaveJsonPath()` expectation
- `toHaveJsonStructure()` expectation
- `toHaveJsonValidationErrors()` expectation
- `toHaveValid()` expectation
- `toHaveInvalid()` expectation

### [v1.3.0](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.2.0...v1.3.0) - 2021-10-15

**Added**
- `toBeOk()` expectation
- `toBeNotFound()` expectation
- `toBeForbidden()` expectation
- `toBeUnauthorized()` expectation
- `toHaveNoContent()` expectation
- `toRender()` expectation
- `toRenderInOrder()` expectation
- `toRenderText()` expectation
- `toRenderTextInOrder()` expectation
- `toContainText()` expectation
- `toContainTextInOrder()` expectation

**Updated**
- new fresh [documentation site](https://def-studio.github.io/pest-plugin-laravel-expectations)


### [v1.2.0](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.1.0...v1.2.0) - 2021-10-11

**Added**

- `toBeRedirect()` expectation
- `toBeSuccessful()` expectation
- `toBeDownload()` expectation
- `toHaveStatus()` expectation
- `toExistInStorage()` expectation

**Fixed**

- [Pest IntelliJ](https://github.com/pestphp/pest-intellij) support for autocompletion

### [v1.1.0](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.0.4...v1.1.0) - 2021-10-08

**Added**
- `toBeAbleTo()` expectation

### [v1.0.4](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.0.3...v1.0.4) - 2021-10-06

**Added**

- `toBelongTo()` expectation
- `toOwn()` expectation

### [v1.0.3](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.0.1...v1.0.3) - 2021-10-05

**Fixed**

- `toBeInDatabase()` the expectation has been fixed and restored


### [v1.0.1](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v1.0.0...v1.0.1) - 2021-10-04

**Removed**

- `toBeInDatabase()` expectation (it collides with pest-plugin-laravel)

### [v1.0.0](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v0.0.5...v1.0.0) - 2021-10-04

**Added**

- `toBeAuthenticated()` expectation
- `toBeValidCredentials()` expectation
- `toBeInvalidCredentials()` expectation

### [v0.0.5](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v0.0.4...v0.0.5) - 2021-10-03

**Fixed**

- styles

### [v0.0.4](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v0.0.3...v0.0.4) - 2021-10-03

**Added**

- `toBeDeleted()` expectation
- `toBeSoftDeleted()` expectation

### [v0.0.3](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v0.0.2...v0.0.3) - 2021-10-03

**Added**

- `toBeCollection()` expectation
- `toBeEloquentCollection()` expectation

### [v0.0.2](https://github.com/pestphp/defstudio-plugin-laravel-expectations/compare/v0.0.1...v0.0.2) - 2021-10-03

**Updated**

- Documentation

### [v0.0.1](https://github.com/def-studio/pest-plugin-laravel-expectations/tree/v0.0.1) - 2021-10-03

- First version
