import requests
from bs4 import BeautifulSoup
import csv

# url_link = "https://www.teacheron.com/tutors-in-india"
url_link = "https://www.teacheron.com/big_data-tutors-in-india"

results = requests.get(url_link).text

doc = BeautifulSoup(results, 'html.parser')

res = doc.find(id = "tutorOrJobSearchItemList").get_text()

li = list(res.split("\n"))
li = list(filter(None, li))
while("" in li):
    li.remove("")

final_list = []
temp_list = []

data = doc.find_all("div", class_="highlightDivOnHover")

final_list = []
new_list = []
for item in data:
    img = item.find("img", {"class": "lozad-custom-profile-img"})
    if img:
        img = img["data-src"]
    res = item.get_text()
    li = list(res.split("\n"))
    li = list(filter(None, li))
    while("" in li):
        li.remove("")    
    new_list.append(img)
    for i in li:
        i = i.strip()
        if i!="":
            new_list.append(i)
    if("km" not in new_list[-1]):
        new_list.append("Not present")
    final_list.append(new_list)
    new_list = []



# for i in final_list:
#     print(i)
#     print("\n")
#     print("--------------------------")
#     print("\n")

with open('big_data_in_india.csv', 'w', newline='', encoding="utf-8") as file:
    writer = csv.writer(file)
    writer.writerow(["Image", "Name", "Short Bio", "Subject Tags", "Long Bio", "Location", "Rate", "Online Teaching", "Total Teaching", "Location"])
    for i in final_list:
        writer.writerow(i)