from selenium import webdriver
import time

driver = webdriver.Chrome(executable_path="./chromedriver")
driver.get("http://localhost/form.php")
driver.find_element_by_name('login_id').send_keys('abc');
driver.find_element_by_name('password').send_keys('123');
driver.find_element_by_id('login').click()
time.sleep(1)
driver.close()
