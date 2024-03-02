import requests
from bs4 import BeautifulSoup
import pandas as pd
from io import StringIO

url_link = "https://www.teacheron.com/tutors-in-india"

results = requests.get(url_link).text

doc = BeautifulSoup(results, 'html.parser')

# print(doc.prettify())

res = doc.find(id = "tutorOrJobSearchItemList").get_text()
# print(res)

# for sp in doc.find_all('span', itemprop="name"):
#     print(sp.text)
    
# for tag in doc.find_all("li"):
#     print("{0}: {1}".format(tag.name, tag.text))

# for link in doc.findAll('a'):
#     print(link.text)