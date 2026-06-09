# FAQs Generating Guide

Use this guide before revamping FAQs for destination pages.

## Goal

Create FAQs that answer real customer doubts before booking or planning a trip.

FAQs should feel like questions from travelers, not internal marketing prompts. Answers should be specific, honest, practical, and page-local.

## FAQ Categories

Use 5 - 8 FAQs per destination page. Pick categories based on what matters for that destination.

### Pricing

Use when customers need to understand cost, inclusions, exclusions, and optional spending.

Good topics:

- What is included in the price?
- What is not included?
- How much extra cash should I bring?
- Are tips required?
- Does the price change by group size or season?
- Are private rooms, upgrades, or custom requests available?

### Destination Features

Use when customers need to understand what makes the destination different.

Good topics:

- What is this destination best known for?
- Is it more nature, culture, food, beach, mountain, or city?
- How is it different from similar destinations?
- Is it worth visiting if I have limited time?
- Which season or highlight should I not miss?

### Difficulty And Safety

Use when the route involves long travel, motorbike riding, hiking, boats, weather risk, remote roads, or physical activity.

Good topics:

- Is the trip physically difficult?
- Is it safe for first-timers?
- Can I self-drive?
- Do I need a local driver or guide?
- Are roads, boats, trails, or weather conditions risky?
- What happens if weather gets bad?

### Age, Health, And Comfort

Use when customers may travel with children, older adults, or people with health concerns.

Good topics:

- Is this trip suitable for children?
- Is this trip suitable for older travelers?
- Is motion sickness likely?
- Are there long walking, climbing, riding, or boat sections?
- Can the pace be adjusted?
- What comfort level should I expect?

### Itinerary And Timing

Use when customers need to know how many days to spend and what the rhythm feels like.

Good topics:

- How many days do I need?
- Can I shorten or extend the route?
- Is the itinerary fixed?
- How much travel time is there each day?
- Can I join from another city?
- What time does the tour start or end?

### Transport And Logistics

Use when the destination needs flights, trains, buses, ferries, transfers, visas, or public transport.

Good topics:

- How do I get there?
- Do I need to book transport in advance?
- Is public transport easy?
- Do I need a visa?
- Can luggage be stored or carried?
- Can pickups and drop-offs be arranged?

### Packing And Preparation

Use when destination conditions affect clothing, luggage, documents, cash, or gear.

Good topics:

- What should I pack?
- Can I bring a suitcase?
- Do I need hiking shoes, swimwear, raincoat, sunscreen, or warm clothes?
- Do I need cash?
- Do I need medication, motion sickness pills, or insect repellent?

### Accommodation And Food

Use when customers need to know comfort level, meals, dietary needs, local food, or room setup.

Good topics:

- What kind of accommodation is included?
- Can I request a private room?
- Are meals included?
- Can vegetarian, vegan, halal, allergy, or other dietary needs be handled?
- Is the food local, simple, spicy, or flexible?

### Booking, Cancellation, And Support

Use for shared service questions across pages.

Good topics:

- How do I book?
- How far in advance should I book?
- Can I customize the tour?
- What if I need to change dates?
- Who supports me during the trip?

## Content Guide

### Question Style

Write questions from the customer's perspective.

Use:

- "Can I join if I have never ridden a motorbike before?"
- "How much cash should I bring?"
- "Is this trip suitable for my parents?"
- "What happens if it rains?"
- "Can I bring a suitcase?"

Avoid:

- "What are the benefits of our tour?"
- "Why is Hi Hi Tour the best choice?"
- "What transportation solutions do we provide?"
- "How does our premium service enhance your journey?"

Questions should sound like something a real traveler would type into Google or ask in chat.

### Answer Style

Answers should be clear, useful, and honest.

Do:

- Answer directly in the first sentence.
- Give concrete details: time, distance, difficulty, weather, price behavior, luggage size, age range.
- Mention tradeoffs instead of hiding them.
- Use a calm, helpful tone.
- Keep each answer around 60 - 120 words unless the topic needs more detail.
- Use `<br/>` only when the answer needs a real paragraph break in JSON.
- Keep destination-specific details in that page's language object.

Avoid:

- Generic travel copy that could fit any destination.
- Over-promising safety, comfort, weather, or exact prices.
- Saying "best", "perfect", or "guaranteed" without proof.
- Repeating the same answer across every destination.
- Writing from the company's perspective first.
- Adding hardcoded visible text in PHP templates.

### Tone

Use traveler-friendly copy: practical, warm, and specific.

The voice can be personal when the page itself is written from travel experience, but it should still help a customer make a decision.

Good tone:

- "Yes, but pack light. Most nights are in different places, so a soft bag is easier than a suitcase."
- "It is doable for beginners if you ride with a local driver. Self-driving is better for people with real motorbike experience."

Weak tone:

- "Our company provides excellent luggage solutions for all valued customers."
- "This destination is perfect for everyone."

## Page Structure

Each destination should have:

- 1 pricing or inclusion FAQ.
- 1 destination-feature FAQ.
- 1 difficulty or safety FAQ.
- 1 timing or itinerary FAQ.
- 1 packing or preparation FAQ.
- 1 page-specific practical concern.
- 1 shared service FAQ only if it still fits the page.

Avoid using the exact same Ha Giang motorbike FAQs for non-Ha-Giang pages.

## Localization Rules

Store all FAQ text in:

- `lang/en.json`
- `lang/vi.json`

Use page-local keys for destination-specific FAQs.

Recommended key pattern:

- `faq_item_0_question`
- `faq_item_0_answer`
- `faq_item_0_category`

If keeping the current `q` / `a` structure, use:

- `faq_q_price`
- `faq_a_price`
- `faq_q_difficulty`
- `faq_a_difficulty`

Use `global` only for truly shared FAQs, such as tipping or booking support. Do not place destination-specific age, weather, road, transport, or packing answers in `global`.

Add every FAQ key to both language files before wiring templates.

## SEO Guide

FAQs should support search intent without becoming keyword spam.

### Search Intent

Match what travelers search before booking:

- "Is Ha Giang Loop safe?"
- "Can beginners do Ha Giang Loop?"
- "How many days in Cao Bang?"
- "Best time to visit Mu Cang Chai rice fields"
- "Is Cat Ba good for families?"
- "Taiwan 8 day itinerary cost"
- "How to travel around Taiwan without a car"

### Keyword Use

Use destination names naturally in questions and answers.

Do:

- Include the destination name in 2 - 4 questions.
- Mention specific features: loop, rice terraces, beach, ferry, train, visa, weather, hiking, easy rider.
- Use plain language that customers search for.

Avoid:

- Repeating the same phrase in every question.
- Keyword-stuffed questions.
- Fake FAQ content only made for ranking.

Bad:

- "Why is Ha Giang Loop Ha Giang Loop the best Ha Giang Loop tour?"

Good:

- "Is the Ha Giang Loop safe for first-time riders?"

### Rich Result Readiness

Write FAQs so they can later be reused for FAQ schema.

Rules:

- One clear question per FAQ.
- One direct answer per FAQ.
- No hidden promises, fake reviews, or unverifiable claims.
- Do not include multiple unrelated questions in one item.
- Keep answers stable and accurate.

### Internal Linking

Where natural, FAQ answers can mention related sections on the same page:

- pricing box
- itinerary
- weather
- transportation
- highlights

In templates, use proper anchors or existing page sections. Do not hardcode new link text in PHP; localize it.

## Generation Checklist

Before writing page FAQs:

- Identify the destination's main booking concerns.
- Choose 5 - 8 categories.
- Draft questions in customer voice.
- Draft direct answers with specific details.
- Remove generic or repeated Ha Giang-only content from non-Ha-Giang pages.
- Add keys to both `lang/en.json` and `lang/vi.json`.
- Wire templates to page-local keys.
- Validate JSON.
- Run `php -l` on touched templates.
- Scan touched templates for new hardcoded user-facing strings.
