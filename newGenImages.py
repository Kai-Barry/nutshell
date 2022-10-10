import requests
from bs4 import BeautifulSoup
import json

def createImages(topic):
    
    formattedTopic = topic.replace(" ", "+")
    USER_AGENT = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:65.0) Gecko/20100101 Firefox/65.0"
    header = {"user-agent": USER_AGENT}
    URL = f"https://bing.com/images/search?q={formattedTopic}&qft=+filterui:aspect-wide&safeSearch=strict"
    page = requests.get(URL, headers=header)
    soup = BeautifulSoup(page.content, "html.parser")
    images = soup.find_all('div', class_='imgpt')
    result = []
    for image in images[:5]:
        result.append(json.loads(image.a['m'])['murl'])
    return result

