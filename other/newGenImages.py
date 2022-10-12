def createImages(topic, subheadings):

    searchFormat = lambda search : search.replace(" ", "+")
    URL = lambda search : f"https://bing.com/images/search?q={search}&qft=+filterui:aspect-wide+filterui:licenseType-Any&safeSearch=strict"

    headers = {
    "User-Agent":
    "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 Edge/18.19582"
	}
    result = []
    
    for i, subheading in enumerate(subheadings):
        query = f"{topic} {subheading}" if i != 0 else topic
        searchURL = URL(searchFormat(query))
        page = requests.get(searchURL, headers=headers)
        soup = BeautifulSoup(page.content, "html.parser")
        images = soup.find_all('img', class_='mimg')
        j = 0
        image = images[j]['src']
        while image in result and j < 8:
            j += 1
            image = images[j]['src']
        result.append(image)
    return result
