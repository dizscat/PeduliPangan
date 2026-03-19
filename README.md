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
You are a senior iOS developer.

Build a complete, production-ready iOS Weather Application using Swift and SwiftUI in Xcode. Do NOT use third-party libraries. Use only native Apple frameworks.

### 📱 App Requirements
The app must be modern, clean, and similar in quality to Apple's Weather app.

---

## 🌤️ Core Features

1. Current Weather
- Display:
  - Current temperature
  - Weather condition (Clear, Rain, Cloudy, etc.)
  - City name
  - Weather icon
  - Feels like temperature
  - Humidity
  - Wind speed

2. 5-Day Forecast
- Horizontal scroll view
- Each day shows:
  - Day name
  - Weather icon
  - Min & max temperature

3. Hourly Forecast
- Scrollable hourly temperature
- Show:
  - Time
  - Icon
  - Temperature

4. Search City
- Search bar to find weather by city name
- Update UI dynamically

5. Location Support
- Use CoreLocation to get user’s current location
- Ask permission properly
- Fallback if denied

---

## 🌐 API Integration

- Use a free weather API (e.g., OpenWeatherMap)
- Implement:
  - Networking layer using URLSession
  - JSON decoding with Codable
  - Error handling

---

## 🧠 Architecture

Use MVVM architecture:
- Model: Weather data structures
- View: SwiftUI views
- ViewModel:
  - Fetch API data
  - Handle business logic
  - Manage loading & error states

---

## 🎨 UI/UX Requirements

- Use SwiftUI only
- Responsive layout
- Gradient background based on weather (sunny = warm, rainy = dark)
- Smooth animations (fade, transitions)
- Use SF Symbols for icons

---

## ⚙️ Additional Features

- Pull to refresh
- Loading indicator while fetching data
- Error message UI if API fails
- Cache last fetched weather (optional bonus)
- Dark mode support

---

## 📂 File Structure

Organize code into:
- Models/
- Views/
- ViewModels/
- Services/ (API + Location)
- Utilities/

---

## 🔧 Deliverables

Provide COMPLETE code including:
- SwiftUI Views
- ViewModel
- API Service
- Location Manager
- Models
- App Entry Point

The code must be:
- Clean and readable
- Well-commented
- Copy-paste ready into Xcode
- Without missing dependencies

---

## 🚫 Constraints

- No third-party libraries (no Alamofire, no SwiftUIX, etc.)
- Must compile and run
- Must follow best practices

---

## 🎯 Goal

A fully functional weather app that:
- Displays real-time weather
- Supports search & location
- Looks modern and smooth
- Demonstrates strong iOS development skills
